<?php
// Database configuration
$servername = "localhost"; // Change this if your database is hosted on a different server
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "mysql"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Optional: Set character set
mysqli_set_charset($conn, "utf8");

// You can uncomment the following line for debugging purposes
echo "Connected successfully";
?>
