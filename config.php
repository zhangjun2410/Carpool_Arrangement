<?php

// connect to database

$servername = "localhost";
$username = "qfzwrbbk_carpool";
$password = "carpool@123";
$dbname = "qfzwrbbk_car_pool";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>