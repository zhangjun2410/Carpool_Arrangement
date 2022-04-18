<?php

// connect to database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_pool";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>