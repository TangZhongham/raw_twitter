
<?php
   // Start the session
   session_start();

   // Check if the user is not logged in
   if (!isset($_SESSION['user_id'])) {
       // Display a message and redirect to the login page
       echo '<script>alert("Please log in to view this page");';
       echo 'window.location.href = "index.html";</script>';
       exit;
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Twitter-like Post</title>
</head>
<body>
<div class="container">
    <?php include 'header.php'; ?>
    <div class="post-container">
    <textarea id="postTextArea" placeholder="What's happening? Tweet here..."></textarea>
    <div class="fake-tweets">
    <h2>Fake Tweets</h2>
    <?php include 'post_list.php'; ?>
    </div>
    </div>
</div>

<form action="tweet.php" method="post" id="postForm" class="post-form">
    <button id="postCancel">X</button>
    <textarea id="postContent" type="text" name="postContent" placeholder="What's happening?"></textarea>
    <!-- <input type="submit" name="postSubmit" id="postSubmit" value="Post"> -->
    <button type="submit" name="postSubmit"  id="postSubmit">Post</button>
    
</form>

<div class="overlay"></div>

<script src="post.js" defer></script>
</body>
</html>