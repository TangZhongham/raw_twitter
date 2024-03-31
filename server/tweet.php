<!-- Author: Zhonghan Tang -->
<?php

// session_start();
include 'session_checker.php';
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['postSubmit'])) {
        $tweet = mysqli_real_escape_string($conn, $_POST['postContent']); // Escape special characters
        $uid = $_SESSION['user_id'];

        // Perform SQL query (assuming $conn is your database connection)
        $sql = "INSERT INTO tweets (text, userid) VALUES ('$tweet', '$uid')";

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
