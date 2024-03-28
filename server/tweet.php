<?php

session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['postSubmit'])) {
        $tweet = $_POST['postContent'];

        // Perform SQL query (assuming $conn is your database connection)
        $sql = "INSERT INTO tweets (text, userid) VALUES ('$tweet', 1)";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = "New record created successfully";
            echo 'New record created successfully';
        } else {
            $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
            echo 'Error creating record: ' . $conn->error;
        }
    } else {
        echo 'Tweet data not received';
    }
} else {
    echo 'No tweet data received';
}

// Close the database connection
$conn->close();

// Refresh the page
header("Location: new_post.php");
exit;
?>
