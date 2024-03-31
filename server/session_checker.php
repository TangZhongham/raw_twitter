<!-- Author: Zhonghan Tang -->
<?php
   // Start the session
   session_start();

   // Check if the user is not logged in
   if (!isset($_SESSION['user_id'])) {
       // Display a message and redirect to the login page
       echo '<script>alert("Please log in to view this page");';
       echo 'window.location.href = "index.php";</script>';
       exit;
   }
?>