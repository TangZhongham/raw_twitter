<?php

session_destroy();

echo '<script>alert("Successfully Logout, Please log in to view this page");';
       echo 'window.location.href = ".";</script>';
       exit;

?>