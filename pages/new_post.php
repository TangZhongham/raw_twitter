
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
    <select id="filterDropdown">
        <option value="all">All</option>
        <option value="likes">Liked</option>
    </select>
    <?php
        include 'db_connection.php';

        $sql = "SELECT u.name, t.text, COUNT(l.id) AS likes 
        FROM twitter_user u 
        JOIN tweets t ON u.id = t.userid
        LEFT JOIN follow f ON u.id = f.userid
        LEFT JOIN (select * from likes WHERE status = 'True') l
         ON u.id = l.userid
        GROUP BY u.name, t.text
        ORDER BY t.id DESC
        ;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="profile-top" class="fake-tweets">';
                // echo '<img src="" alt="user_photo" class="p_Photo">';
                $hashedName = hash('md5', $row["name"]);
                echo '<img src="" alt="Avatar" class="p_Photo" data-hashed-name="' . $hashedName . '">';
                echo '<div class="profile-top-middle">';
                echo '<h1 class="p_name" class="tweet-avatar" >' . $row["name"] . '</h1>';
                echo '<p class="p_info tweet-text">' . $row["text"] . '</p>';
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
<script>
// JavaScript code for filtering tweets based on dropdown selection
document.getElementById('filterDropdown').addEventListener('change', function() {
    var filterValue = this.value;
    var tweets = document.querySelectorAll('.fake-tweets .profile-top');

    tweets.forEach(function(tweet) {
        if (filterValue === 'all') {
            tweet.style.display = 'block';
        } else if (filterValue === 'likes') {
            // Check if the tweet has more likes than a threshold (adjust as needed)
            var likesText = tweet.querySelector('.tweet-likes').textContent;
            var likesCount = parseInt(likesText.match(/\d+/)[0]);
            if (likesCount > 0) {
                tweet.style.display = 'block';
            } else {
                tweet.style.display = 'none';
            }
        }
        // Add more filter conditions as needed
    });
});
</script>
</body>
</html>