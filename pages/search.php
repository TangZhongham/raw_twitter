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
        <a href="post.html"><button class="page-button">Home</button></a>
        <a href="search.html"><button class="page-button">Search</button></a>
        <button class="page-button">Random</button>
    </div>

    <div class="post-container">
    <form action="search.php" method="GET">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
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
            $sql = "SELECT * FROM tweets WHERE text LIKE '%$searchQuery%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output search results
                while($row = $result->fetch_assoc()) {
                    echo '<div class="tweet">';
                    echo '<div class="tweet-avatar"></div>';
                    echo '<div class="tweet-content">';
                    echo '<p class="tweet-author">' . $row["author"] . '</p>';
                    echo '<p class="tweet-text">' . $row["text"] . '</p>';
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

<script src="post.js" defer></script>
</body>
</html>
