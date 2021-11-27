<?php
$servername = "localhost";
$username = "asifulmamun";
$password = "1998";
$dbname = "takmil2021";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
