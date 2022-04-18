<?php
session_start();
if(!isset($_SESSION['user_id']) && $_SESSION['user_id']==""){
header("Location:login.php");	
}
include_once("config.php");
    /* lat/lng data will be added to this array */
    $locations=array();

	//Get user latitude longitude from database
	
$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $nama_kabkot = $row['physicalAddress'];
            $longitude = $row['longitude'];                              
            $latitude = $row['latitude'];

            /* Each row is added as a new array */
            $markers[]=array( $nama_kabkot, $latitude, $longitude );
        }
}
?>
<style>
.main {
padding: 15px 15px 15px 15px;
}
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
<div class="main">
<div class="container">
<button class="btn btn-info" style="float:right;margin-botton:10px;margin-left:5px;"><a href="login.php?logout=1" style="color:white;text-decoration:none">Logout</a></button>
<button class="btn btn-info" style="float:right;margin-botton:10px;margin-left:5px;"><a href="index.php" style="color:white;text-decoration:none">View Users</a></button><br><br><br>
<div id="map_wrapper">
    <div id="map_canvas" class="mapping"></div>
</div>
</div>
</div>

<style>

    #map_wrapper {
        height: 400px;
    }

    #map_canvas {
        width: 100%;
        height: 100vh;
    }


</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuBlCHlyI5lVVqpLsWoSdTMDSQQTqhWq4"></script>
<script>
//function to display users on map
    function initialize() {
        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: "roadmap",
            center: new google.maps.LatLng(34.3623, -89.5568), // somewhere in the uk BEWARE center is required
            zoom: 3,
        };

        // Display a map on the page
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        map.setTilt(45);

        // Multiple Markers
        var markers = <?php echo json_encode( $markers ); ?>;

        // Info Window Content
        var infoWindowContent = [
            ['<div class="info_content">' +
            '<h3>London Eye</h3>' +
            '<p>The London Eye is a giant Ferris wheel situated on the banks of the River Thames. The entire structure is 135 metres (443 ft) tall and the wheel has a diameter of 120 metres (394 ft).</p>' + '</div>'],
            ['<div class="info_content">' +
            '<h3>Palace of Westminster</h3>' +
            '<p>The Palace of Westminster is the meeting place of the House of Commons and the House of Lords, the two houses of the Parliament of the United Kingdom. Commonly known as the Houses of Parliament after its tenants.</p>' +
            '</div>']
        ];

        // Display multiple markers on a map
        var infoWindow = new google.maps.InfoWindow();
        var marker, i;

        // Loop through our array of markers & place each one on the map
        for (i = 0; i < markers.length; i++) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0]
            });

            // Allow each marker to have an info window.//AIzaSyAuBlCHlyI5lVVqpLsWoSdTMDSQQTqhWq4
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));

            // Automatically center the map fitting all markers on the screen
            map.fitBounds(bounds);
        }

        //Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
            this.setZoom(5);
            google.maps.event.removeListener(boundsListener);
        });

    }
    google.maps.event.addDomListener(window, 'load', initialize);


</script>