<!-- Author: Zhonghan Tang -->
<?php include 'session_checker.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/style.css">

<title>Twitter-like Post</title>
</head>
<body>
<div class="container">
    <?php include 'header.php'; ?>
    <div class="post-container" >
    <form action="search.php" method="GET" >
        <input type="text" name="query" placeholder="Search..." id="searchTextArea">
        <button type="submit" class="p_top_edit">Search</button>
    </form>
    <div class="fake-tweets">
    <h2>Search Results</h2>
    <?php
        // Include database connection file
        include 'db_connection.php';

        // Check if query parameter is set
        if (isset($_GET['query'])) {
            $searchQuery = $_GET['query'];
            // Perform search query in the database
            $sql = "SELECT u.name, t.text, COUNT(l.id) AS likes 
            FROM twitter_user u 
            JOIN tweets t ON u.id = t.userid
            LEFT JOIN follow f ON u.id = f.userid
            LEFT JOIN (select * from likes WHERE status = 'True') l
             ON u.id = l.userid
            WHERE t.text LIKE '%$searchQuery%'
            GROUP BY u.name, t.text
            ORDER BY t.id DESC
            ;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output search results
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
                echo "No results found.";
            }

            // Close database connection
            $conn->close();
        }
    ?>
    </div>
    </div>
</div>

<!-- Post form -->
<div id="postForm" class="post-form">
    <button id="postCancel">X</button>
    <textarea id="postContent" placeholder="What's happening? Tweet here..."></textarea>
    <button id="postSubmit">Post</button>
</div>

<div class="overlay"></div>

<script src="../scripts/post.js" defer></script>
</body>
</html>
