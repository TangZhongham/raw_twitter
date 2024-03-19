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
            // Check if user is logged in
            session_start();
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                echo '<a href="logout.php"><button class="page-button">Logout</button></a>';
            } else {
                echo '<a href="login.php"><button class="page-button">Login</button></a>';
            }
        ?>
    </div>

    <div class="post-container">
    <textarea id="postTextArea" placeholder="What's happening? Tweet here..."></textarea>
    <div class="fake-tweets">
    <h2>Fake Tweets</h2>
    <?php
        // Include database connection file
        include 'db_connection.php';

        // Fetch fake tweets from the database
        $sql = "SELECT * FROM mysql.tweets";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="tweet">';
                echo '<div class="tweet-avatar"></div>';
                echo '<div class="tweet-content">';
                echo '<p class="tweet-author">' . $row["author"] . '</p>';
                echo '<p class="tweet-text">' . $row["text"] . '</p>';
                echo '</div></div>';
            }
        } else {
            echo "0 results";
        }

        // Close database connection
        $conn->close();
    ?>
    </div>
    </div>
</div>

<!-- Post form -->
<div id="postForm" class="post-form">
    <button id="postCancel">X</button>
    <textarea id="postContent" placeholder="What's happening?"></textarea>
    <button id="postSubmit">Post</button>
</div>

<div class="overlay"></div>

<script src="post.js" defer></script>
</body>
</html>
