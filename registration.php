<?php
session_start();

include_once("config.php");
$section="Sign Up";
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
		//insert user in database
		
		 $date=date("Y-m-d H:m:s");
		$sql = "INSERT INTO `users` (`id`, `fname`,`lname`, `email`, `phoneNum`, `password`, `isactive`, `dt`, `hasCar`, `openCarSeatCount`, `physicalAddress`, `latitude`, `longitude`) VALUES 
		(NULL, '".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['email']."', '".$_POST['phoneNum']."', '".$_POST['password']."', '0', '".$date."', '".$_POST['hasCar']."', '".$_POST['openCarSeatCount']."', '".$_POST['physicalAddress']."', '".$_POST['latitude']."', '".$_POST['longitude']."')";

			if ($conn->query($sql) === TRUE) {
				$_SESSION['contact_msg'] = "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
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
        <title>Manage Carppool Arrangements</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script language="javascript">
		function enableDisable(bEnable, textBoxID)
		{
			document.getElementById(textBoxID).disabled = !bEnable
		}
		</script>
		
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
	
        <div class="col-xs-12 col-sm-12 col-md-10 ">
		<div style="float:right;margin: 20px 20px 20px 20px;">
		<button class="btn btn-info" style="margin-left:5px;"><a href="login.php" style="color:white;text-decoration:none">Login</a></button>
		<button class="btn btn-info" style="margin-left:5px;"><a href="view_users_map.php" style="color:white;text-decoration:none">Google map</a></button>
		<button class="btn btn-info" style="margin-left:5px;"><a href="index.php" style="color:white;text-decoration:none">View Users</a>
		<button class="btn btn-info" style="margin-left:5px;"><a href="login.php?logout=1" style="color:white;text-decoration:none">Logout</a></button></button><br><br><br>
		</div>
            <legend><h2><a href="http://www.jquery2dotnet.com"></a> Sign Up</h2></legend>
            <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form" method="post">
            <div class="row">
			<?php if (isset($_SESSION['contact_msg'])) {
        echo '<div class="alert alert-success" style="text-align:center">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'. $_SESSION['contact_msg'].'</div>';
        unset($_SESSION['contact_msg']);
      } ?>
				<h4 class="heading">Please provide following information to us!</h4>
                <div class="col-xs-3 col-md-3 col-md-3 col-lg-3 label_format">
					<label>First Name</label>
				</div><!--col-xs-->
				<div class="col-xs-9 col-md-9 col-lg-9"> 
					<div class="input-group">
						<input class="form-control" name="fname" type="text">
					</div>
                </div><!--col-lg-->
				<div class="col-xs-3 col-md-3 col-md-3 col-lg-3 label_format">
					<label>Last Name</label>
				</div><!--col-xs-->
				<div class="col-xs-9 col-md-9 col-lg-9"> 
					<div class="input-group">
						<input class="form-control" name="lname" type="text">
					</div>
                </div><!--col-lg-->
				 <div class="col-xs-3 col-md-3 col-md-3 col-lg-3 label_format">
					<label>Email</label>
				</div><!--col-xs-->
				<div class="col-xs-9 col-md-9 col-lg-9"> 
					<div class="input-group">
						<input class="form-control" name="email" type="text">
					</div>
                </div><!--col-lg-->
				<div class="col-xs-3 col-md-3 col-md-3 col-lg-3 label_format">
					<label>Phone</label>
				</div><!--col-xs-->
				<div class="col-xs-9 col-md-9 col-lg-9"> 
					<div class="input-group">
						<input class="form-control" name="phoneNum" type="text">
					</div>
                </div><!--col-lg-->
				 <div class="col-xs-3 col-md-3 col-md-3 col-lg-3 label_format">
					<label>Physical Address</label>
				</div><!--col-xs-->
				<div class="col-xs-9 col-md-9 col-lg-9"> 
					<div class="input-group">
						<textarea class="form-control" name="physicalAddress" id="address" type="text"></textarea>
					</div>
                </div><!--col-lg-->
				<div class="col-xs-3 col-md-3 col-md-3 col-lg-3 label_format">
					<label>Password</label>
				</div><!--col-xs-->
				<div class="col-xs-9 col-md-9 col-lg-9"> 
					<div class="input-group">
						<input class="form-control" name="password" type="text">
					</div>
                </div><!--col-lg-->
				
				<div class="col-xs-3 col-md-3 col-md-3 col-lg-3 label_format">
					<label> </label>
				</div><!--col-xs-->
				<div class="col-xs-9 col-md-9 col-lg-9 "> 
						<p><input type="checkbox" value="1" name="hasCar" onclick="enableDisable(this.checked, 'seatCount')" class="checkbox1"> Have a car that can pick up others?</p>
                </div><!--col-lg-->
				<div class="col-xs-3 col-md-3 col-md-3 col-lg-3 label_format">
					<label>number of seats available</label>
				</div><!--col-xs-->
				<div class="col-xs-9 col-md-9 col-lg-9 "> 
					<div class="input-group">
						<input class="form-control" id="seatCount" name="openCarSeatCount" type="text" disabled>
					</div>
                </div><!--col-lg-->
				
				<div class="col-xs-3 col-md-3 col-md-3 col-lg-3 label_format">
					<label> </label>
				</div><!--col-xs-->
				<div class="col-xs-9 col-md-9 col-lg-9 "> 
					<div class="input-group">
					<input type="hidden" id="latitude" name="latitude" value=""/>
                        <input type="hidden" id="longitude" name="longitude" value=""/>
						<p><button class="btn btn-lg btn-primary" type="submit">
                submit</button><button class="btn btn-lg btn-primary" type="submit">
                reset</button></p>
					</div>
                </div><!--col-lg-->
				
            </form>
        </div>
    </div>
</div>
</div>
<script>
   //move the below into a function so that you can call it at the appropriate time
   function geocoding(inputAddress){
    var address = inputAddress;
       $.getJSON( {
        url  : 'https://maps.googleapis.com/maps/api/geocode/json',
        data : {
            sensor  : false,
            address : address,
            key		: 'AIzaSyCdMJxWB2liBB3bR0xOJSF2eNmQ3sV3krk'
        },
        success : function( data, textStatus ) {
            /*console.log(data);
            console.log(data.results);
            console.log(data.results[0].geometry);
            console.log(data.results[0].geometry.location);
            console.log(data.results[0].geometry.location.lat);*/
            var latitude=data.results[0].geometry.location.lat;
            var longitude=data.results[0].geometry.location.lng;
            //alert(  latitude );
            //alert(  longitude );
            //alert(latitude+" "+longitude)
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
            $('#form').unbind('submit').submit();
        }
    } );
   }
   $("#form").submit(function(e){
	   //alert('govi');exit;
       e.preventDefault();
       geocoding($('#address').val());
   });
</script>
</body>
</html>