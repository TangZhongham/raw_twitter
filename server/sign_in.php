<!-- Author: Azadeh Sadeghtehrani -->
<?php
session_start();
include 'db_connection.php'; 

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
        echo '<script>alert("You are login successfully.");';
        echo 'window.location.href = "new_post.php";</script>';
        exit;
    } else {
        // Authentication failed
        echo '<script>alert("Invalid email or password or you do not have an account. Please try again.");';
        echo 'window.location.href = "index.php";</script>';
        exit;
    }
}

// Close database connection
$conn->close();
?>




