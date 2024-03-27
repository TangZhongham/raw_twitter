<?php
session_start();
include 'db_connection.php'; 

// Initialize error variable
$error = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform SQL query to check if the user exists in the database
    $sql = "SELECT * FROM twitter_user WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        // User is authenticated
        $user = $result->fetch_assoc();

        // Store user data in session variables
        $_SESSION['user_id'] = $user['id']; // Assuming your user table has a column named 'id'
        $_SESSION['user_name'] = $user['name'];
        
        // Redirect to the dashboard or any other page after successful login
        header("Location: new_post.php");
    } else {
        // Authentication failed
        $error = "Invalid email or password or you don't have an account. Please try again.";

    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Assignment2 - Twitter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <!-- Centered container for error message and button -->
    <div class="container1">
        <!-- Display error message if authentication fails -->
        <?php if (!empty($error)) : ?>
            <div style="color: red; font-size: 15px; font-weight:bold;"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Button wrapped inside the centered container -->
        <div class="form-element2">
            <a href="index.php" class="btn">First Page</a> <!-- Style the link as a button -->
        </div>
    </div>
</body>
</html>


