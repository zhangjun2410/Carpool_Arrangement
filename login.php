<?php
session_start();
include_once("config.php");
$section="Sign Up";
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
			// check user login credintials 
		$sql = "SELECT * FROM `users` where email='".$_POST['email']."' and password='".$_POST['password']."'";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				//echo $row["id"];exit;
				$_SESSION['user_id']=$row["id"];
				$_SESSION['fname']=$row["fname"];
				$_SESSION['lname']=$row["lname"];
				$_SESSION['email']=$row["email"];
				$_SESSION['physicalAddress']=$row["physicalAddress"];
				header("Location:index.php");
			}
		}
		else
		echo	$Err="login credentials is invalid";
	}
	if (isset($_GET['logout'])) 
    {
		unset($_SESSION['user_id']);
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Manage Carppool Arrangements</title>

	<!-- Bootstrap Css Start -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
	<!-- Bootstrap Css End -->

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
	
        <div class="col-xs-12 col-sm-12 col-md-8 ">
		<div style="float:right;margin: 20px 20px 20px 20px;">
		<button class="btn btn-info" ><a href="registration.php" style="color:white;text-decoration:none">Registration </a></button>
		<button class="btn btn-info" ><a href="view_users_map.php" style="color:white;text-decoration:none">Google map</a></button>
		<button class="btn btn-info" ><a href="index.php" style="color:white;text-decoration:none">View Users</a></button><br><br><br>
		</div>
            <legend><h2><a href="http://www.jquery2dotnet.com"></a>login</h2></legend>
            <form class="form" action="" id="form" method="post">
            <div class="row">
			<?php if (isset($_SESSION['contact_msg'])) {
        echo '<div class="alert alert-success" style="text-align:center">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'. $_SESSION['contact_msg'].'</div>';
        unset($_SESSION['contact_msg']);
      } ?>
				
                <div class="col-xs-3 col-md-3 col-md-3 col-lg-3 label_format">
					<label>Email</label>
				</div><!--col-xs-->
				<div class="col-xs-9 col-md-9 col-lg-9"> 
					<div class="input-group">
						<input class="form-control" name="email" type="text">
					</div>
                </div><!--col-lg-->
				<div class="col-xs-3 col-md-3 col-md-3 col-lg-3 label_format">
					<label>Password</label>
				</div><!--col-xs-->
				<div class="col-xs-9 col-md-9 col-lg-9"> 
					<div class="input-group">
						<input class="form-control" name="password" type="password">
					</div>
                </div><!--col-lg-->
						<p><button style="float:right" class="btn btn-lg btn-primary" type="submit">Login</button></p>
					</div>
                </div><!--col-lg-->

            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>