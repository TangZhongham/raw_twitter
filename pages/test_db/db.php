<?php
// Include the db_connection.php file
include 'db_connection.php';

// Now you can use the $conn variable to perform database operations
// For example, executing queries or interacting with the database
// Example:
$sql = "SELECT * FROM mysql.tweets";
$result = $conn->query($sql);
// Rest of your PHP code here...
?>
