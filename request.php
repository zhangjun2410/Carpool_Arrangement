<?php
session_start();
if(!isset($_SESSION['user_id']) && $_SESSION['user_id']==""){
header("Location:login.php");	
}
include_once("config.php");
$section="Sign Up";
    if ($_GET["user_id"]) 
    {
		// get requested user details
		 
		$sql = "SELECT * FROM `users` where id='".$_GET['user_id']."'";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				//echo $row["id"];exit;
				$id=$row["id"];
				$fname=$row["fname"];
				$lname=$row["lname"];
				$email=$row["email"];
				$physicalAddress=$row["physicalAddress"];
			}
		}
		else
		echo	$Err="login credentials is invalid";
	}
	
	// Code for send email to requested user
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $flag=true;
        if (empty($_POST['request']))
        {
            $requestErr = "Please Enter Request";
            $flag=false;
        }
        if($flag)
        {
            $request       = $_POST['request'];

            // message
            $mailmessage = "<html><body>";
            $mailmessage .= "<h2>Request</h2>";
            $mailmessage .= "Hi $fname<br><br><br>$request";         
            
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
            $headers .= 'From: Request<'.$_SESSION['email'].'>' . "\r\n";
            $headers .= "X-Priority: 3\r\n";
            $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
            
            
            $to = "$email";        
            
            $mail_subject = "Request";
            
			// php mail function for send mail
            $result = @mail($to, $mail_subject, $mailmessage, $headers);
            if($result) 
            {   
                $_SESSION['contact_msg'] = "Request Send Successfully.";
                
                echo'<script type="text/javascript">window.location.href="request.php";</script>';

                exit();             
                
            }
            else
            {
                
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Manage Carpool Arrangements</title>

	<!-- Bootstrap Css Start -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!-- Custom Css Start -->
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <link href="css/media.css" rel="stylesheet" type="text/css">
	<!-- Custom Css End -->
		<style>
			.input-group {
			position: relative;
			display: table;
			border-collapse: separate;
			width: 100%;
			border-radius: 30px;
			margin-bottom: 15px;
			}
			.label_format{
			text-align: right;
			}
			.label_format label {
			padding-right: 8px;
			}
			.form-control {
			border-radius: 4px !important;
			}
			.heading{margin-bottom: 20px;text-align: center;padding-left: 20px; text-align: center;}
			.btn-group-lg>.btn, .btn-lg {
			padding: 5px 13px;
			font-size: 16px;
			line-height: 1.3333333;
			border-radius: 6px;
			margin-right: 12px;
			}
			.btn-primary {
			background: #5bc0de;
			border: none;
			}
			.btn-primary:hover{
			background: #399ebc;
			}
		</style>
    </head>
<body>
<div class="signup-form">

	<div class="container">
    <div class="row">
	
        <div class="col-xs-12 col-sm-12 col-md-10 ">
		<div style="float:right;margin: 20px 20px 20px 20px;">
		<button class="btn btn-info" ><a href="view_users_map.php" style="color:white;text-decoration:none">Google map</a></button>
		<button class="btn btn-info" ><a href="index.php" style="color:white;text-decoration:none">View Users</a></button>
		<button class="btn btn-info" ><a href="login.php?logout=1" style="color:white;text-decoration:none">Logout</a></button><br><br><br>
		</div>
            <legend><h2><a href="http://www.jquery2dotnet.com"></a>Request</h2></legend>
            <form class="form" action="" id="form" method="post">
            <div class="row">
			<?php if (isset($_SESSION['contact_msg'])) {
        echo '<div class="alert alert-success" style="text-align:center">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'. $_SESSION['contact_msg'].'</div>';
        unset($_SESSION['contact_msg']);
      } ?>
				<h4 class="heading">Please provide Request Message!</h4>
                <div class="col-xs-3 col-md-3 col-md-3 col-lg-3 label_format">
					<label>Request</label>
				</div><!--col-xs-->
				<div class="col-xs-9 col-md-9 col-lg-9"> 
					<div class="input-group">
						<textarea class="form-control" name="request" id="request" type="text"></textarea>
					</div>
                </div><!--col-lg-->
						<p style="float:right"><button class="btn btn-lg btn-primary" type="submit">Send</button></p>
					</div>
                </div><!--col-lg-->

            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>