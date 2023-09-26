<?php
$servername = "localhost";
$username = "s632021120";
$password = "632021120";
$dbname = "db632021120";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>