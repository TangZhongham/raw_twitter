<!-- Author: Zhonghan Tang -->

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

<script>
// JavaScript code for filtering tweets based on dropdown selection
document.getElementById('filterDropdown').addEventListener('change', function() {
    var filterValue = this.value;
    var tweets = document.querySelectorAll('.fake-tweets .profile-top');

    tweets.forEach(function(tweet) {
        if (filterValue === 'all') {
            // fixed unstable profile pic and text
            tweet.style.display = 'block';
            // tweet.style.visibility = 'visible'; // Show tweet
        } else if (filterValue === 'likes') {
            // Check if the tweet has more likes than a threshold (adjust as needed)
            var likesText = tweet.querySelector('.tweet-likes').textContent;
            var likesCount = parseInt(likesText.match(/\d+/)[0]);
            if (likesCount > 0) {
                // tweet.style.display = 'block';
                tweet.style.visibility = 'visible'; // Show tweet
            } else {
                tweet.style.display = 'none';

            }
        }
        // Add more filter conditions as needed
    });
});
</script>