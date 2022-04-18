<?php
//to start session
session_start();

// check user is login or not
if(!isset($_SESSION['user_id']) && $_SESSION['user_id']==""){
header("Location:login.php");	
}

//include database file
include_once("config.php");
$section="Sign Up";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" class="init">
// include data table

$(document).ready(function() {
$('#example').DataTable( {
"order": [[ 0, "asc" ]]
} );
} );
</script>	
<style>
.main {
padding: 15px 15px 15px 15px;
}
</style>
</head>
<body>
<div class="main">
<div class="container">
<button class="btn btn-info" style="float:right;margin-botton:10px;margin-left:5px;"><a href="login.php?logout=1" style="color:white;text-decoration:none">Logout</a></button>
<button class="btn btn-info" style="float:right;margin-botton:10px;margin-left:5px;"><a href="view_users_map.php" style="color:white;text-decoration:none">Google map</a></button><br><br><br>
<table id="example" class="display">
<thead>
<tr>
<th width="100px"><center>First Name</th>
<th width="30%"><center>Last Name</th>
<th width="30%"><center>Email</th>
<th><center>Address</th>
<th><center>Phone Number</th>
<th><center>Has Car</th>
<th><center>Seats</th>
<th><center>Request</th>
</tr>
</thead>
<tbody>
<?php

//Get users from database

$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
<tr>
<td><center><?php echo $row['fname']?></td>
<td><center><?php echo $row['lname']?></td>
<td><center><?php echo $row['email']?></td>
<td><center><?php echo $row['physicalAddress']?></b></td>
<td><center><?php echo $row['phoneNum']?></td>
<?php if($row['hasCar']=='1'){ ?>
<td><center>Yes</td>
<?php }
else {	?>
<td><center>No</td>
<?php } ?>
<td><center><?php echo $row['openCarSeatCount']?></td>
<td><center><button class="btn btn-info" ><a href="request.php?user_id=<?php echo $row['id']?>" style="color:white;text-decoration:none">Request</a></button></td>
</tr>	
<?php
}
} else {
    echo "0 results";
}
// function to get distance
function distance($lat1, $lon1, $lat2, $lon2, $unit) 
{ 
   $theta = $lon1 - $lon2; 
   $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
   $dist = acos($dist); 
   $dist = rad2deg($dist); 
   $miles = $dist * 60 * 1.1515;
   $unit = strtoupper($unit);

   if ($unit == "K") 
   {
      return ($miles * 1.609344); 
   } 
   else 
   {
      return $miles;
   }
}
?>
</tbody>
</table>
</div>
</div>
</body>
</html>