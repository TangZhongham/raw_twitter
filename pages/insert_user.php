<?php
session_start();
include 'db_connection.php'; 

// Check if the form is submitted
if (isset($_POST["signup"])) {
    // Retrieve user input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $dob_month = $_POST['mounth'];
    $dob_day = $_POST['day'];
    $dob_year = $_POST['year'];

    // Perform SQL query to insert user data
    $sql = "INSERT INTO twitter_user (name, email, password, month, day, year)
            VALUES ('$name', '$email', '$password', '$dob_month', '$dob_day', '$dob_year')";

    if ($conn->query($sql) === TRUE) {
        // Retrieve the user's ID after successful registration
        $user_id = $conn->insert_id;
        
        // Store the user's ID in a session variable
        $_SESSION['user_id'] = $user_id;

        // Redirect to the desired page after successful registration
        $_SESSION['success'] = "New record created successfully";
        header("Location: new_post.php");
        exit;
    } else {
        $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
        header("Location: index.php"); // Redirect back to the sign-up page if an error occurs
        exit;
    }
} else {
    $_SESSION['error'] = "Form not submitted"; // This will help you determine if the form submission is the issue
    header("Location: index.php"); // Redirect back to the sign-up page if the form is not submitted
    exit;
}

$conn->close(); // Close database connection
?>


