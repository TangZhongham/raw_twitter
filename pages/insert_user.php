<?php
session_start();
    include 'db_connection.php';
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $dob_month = $_POST['mounth'];
        $dob_day = $_POST['day'];
        $dob_year = $_POST['year'];

        // Perform SQL query
        $sql = "INSERT INTO twitter_user (name, email, password, month, day, year)
        VALUES ('$name', '$email', '$password', '$dob_month', '$dob_day', '$dob_year')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = "New record created successfully";
        } else {
            $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
        }
    }

$conn->close();

// go to first page
header("Location: new_post.php");
exit;
?>