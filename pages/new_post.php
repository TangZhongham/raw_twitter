
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
    <div class="left-section">
        <a href="post.php"><button class="page-button">Home</button></a>
        <a href="search.php"><button class="page-button">Search</button></a>
        <a href="profile.php"><button class="page-button">Profile</button></a>
        <a href="random.php"><button class="page-button">Random</button></a>
        <?php
            if(isset($_SESSION['user_id'])) {
                echo '<a href="logout.php"><button class="page-button">Logout</button></a>';
            } else {
                echo '<a href="index.php"><button class="page-button">Login</button></a>';
            }
        ?>
    </div>

    <div class="post-container">
    <textarea id="postTextArea" placeholder="What's happening? Tweet here..."></textarea>
    <div class="fake-tweets">
    <h2>Fake Tweets</h2>
    <?php
        include 'db_connection.php';

        $sql = "SELECT u.name, u.image, t.text, COUNT(l.id) AS likes 
                FROM twitter_user u 
                JOIN tweets t ON u.id = t.userid
                JOIN follow f ON u.id = f.userid
                JOIN likes l ON u.id = l.userid
                WHERE l.status = 'True'
                GROUP BY u.name, u.image, t.text";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="tweet">';
                echo '<div class="tweet-avatar"><img src="' . $row["image"] . '" alt="Avatar"></div>';
                echo '<div class="tweet-content">';
                echo '<p class="tweet-author">' . $row["name"] . '</p>';
                echo '<p class="tweet-text">' . $row["text"] . '</p>';
                echo '<p class="tweet-likes">' . $row["likes"] . ' likes</p>';
                echo '</div></div>';
            }
        } else {
            echo "0 results";
        }

        $conn->close();
    ?>
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