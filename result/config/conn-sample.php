<?php
$servername = "localhost";
$username = "asifulmamun";
$password = "1998";
$dbname = "takmil2021";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Set charset for unicode problem solve
$conn -> set_charset("utf8");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
