<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "recipe";  // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful message (for testing purposes)
// echo "Connected successfully";
?>
