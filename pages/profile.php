
<?php
include 'profile_process.php';
?>
<!-- ================HTML======================== -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<!-- <script src="profile.js"></script> -->
<title>Profile</title>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <a href="post.html"><button class="page-button">Home</button></a>
            <a href="search.html"><button class="page-button">Search</button></a>
            <a href="profile.html"><button class="page-button">Profile</button></a>
            <button class="page-button">Random</button>
        </div>
    
        <div class="post-container">
                <!-- the top area -->
            <div class="profile-top" class="fake-tweets">
                <img src="images/1.jpeg" alt="user_photo" id="p_Photo">
                <div class="profile-top-middle">
                    <h1 class="p_name" class="tweet-avatar"><?php echo"{$row["name"]}" ?></h1>
                    <p class="p_info  tweet-text" id="descriptionInfo"><?php echo"{$row["description"]}" ?></p>
                </div>
                <button class="p_top_edit" onclick="showEditForm()" >Edit profile</button>
            </div>
            <!--  fake tweets here -->
            <div class="fake-tweets">
                <h2>Fake Tweets</h2>
                <?php
                //     ======tweets======
                    // get tweets
                    $sql_tweet = "SELECT id,text FROM tweets WHERE userid = 1";
                    $result_tweet = $conn -> query($sql_tweet);

                    if($result_tweet ->num_rows > 0){
                        while ($row_tweet = $result_tweet->fetch_assoc()) {
                            echo '<div class="tweet">';
                            echo '<div class="tweet-content">';
                            echo '<p class="tweet-text">'.$row_tweet['text'].'</p>';
                            echo '</div>';
                            echo '<div class="tweet-modify">';
                            echo '<button class="modify-button tweet-edit" onclick="showEditTweet(\'' . $row_tweet['text'] . '\', ' . $row_tweet['id'] . ')">Edit</button>';
                            echo '<button class="modify-button tweet-delete" onclick="showDeleteConfirmation(' . $row_tweet['id'] . ')">Delete</button>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "<h4 class='noTweet'>You don't have any tweet yet.<h4>";
                        echo '<div class="nothingContainer">';
                        echo '<img src="images/nothing.png" alt="nothing" id="nothing">';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- this is the prompt of the top area -->
    <div id="profileEditForm" class="profile-edit-form">
    
        <form action="profile_process.php" method="post">
            <label for="editName" id="editName-label">Name</label>
            <input type="text" name="editName" id="editName" class="editinfo" placeholder="Name-- less than 8 characters">
            <label for="editDescription">Description</label>
            <input type="text" name="editDescription" id="editDescription" class="editinfo" placeholder="Description">
            <input type="submit" name="saveProfile" id="saveProfile" value="save">
        </form>
            <button  id="closeProfileEdit">x</button>
    </div>
    <div class="overlay"></div>
    <!-- this is the prompt of the tweet -->
    <div id="postForm" class="post-form">
        <button id="postCancel">X</button>
        <form action="profile_process.php" method="post">
            <textarea id="postContent" name="postContent"></textarea>
            <input type="hidden" id="tweetId" name="tweetId" value="">
            <input type="submit" name="postSubmit" id="postSubmit" value="Post">
        </form>
    </div>
    <!-- this is the prompt of delete -->
    <div id="deleteTweet" class="post-form">
        <button  id="deleteCancel">x</button>
        <form action="profile_process.php" method ="post">
            <h3 id="deleteh2">Are you sure delete this tweet?</h3>
            <input type="submit" name="deleteButton" id="deleteButton" value="delete" >
            <input type="hidden" id="deleteTweetId" name="deleteTweetId" value="">
        </form>

    </div>
</body>
</html>

<?php
include 'profileJs.php';
?>


<!-- ==============================JS================================ -->
<!-- <script>
    // get random avatar
    window.onload =function(){
        var defaultAvatar =[
            "images/1.jpeg",
            "images/2.png",
            "images/3.jpg",
            "images/4.jpeg",
            "images/5.jpeg",
            "images/6.jpeg",
        ]

        var random_number = Math.floor(math.random_number * defaultAvatar.length);
        var userAvatar = defaultAvatar(random_number);
        document.getElementById('p_Photo').src = userAvatar;
        
    }

function showEditForm() {
    // Display the edit profile form and overlay
    document.getElementById('profileEditForm').style.display = 'block';
    document.getElementsByClassName('overlay')[0].style.display = 'block';
    // Fill the edit form fields with existing user data
    document.getElementById('editName').value = '<?php echo"{$row["name"]}" ?>';
    document.getElementById('editDescription').value = '<?php echo $row["description"]; ?>';
}
    // Function to hide the edit profile form
    document.getElementById('closeProfileEdit').addEventListener('click', function() {
        document.getElementById('profileEditForm').style.display = 'none';
        document.getElementsByClassName('overlay')[0].style.display = 'none';
    });

    // Display the edit tweet form and overlay
function showEditTweet(tweetText, tweetId){
    document.getElementById('postForm').style.display = 'block';
    document.getElementsByClassName('overlay')[0].style.display = 'block';
    document.getElementById('postContent').value = tweetText;
    document.getElementById('tweetId').value = tweetId;
}
    // hide the edit tweet form and overlay
    document.getElementById('postCancel').addEventListener('click',function(){
    document.getElementById('postForm').style.display = 'none';
    document.getElementsByClassName('overlay')[0].style.display = 'none';
    });

    // show delete the tweet
    function showDeleteConfirmation(deleteTweetId) {
    document.getElementById('deleteTweet').style.display = 'block';
    document.getElementsByClassName('overlay')[0].style.display = 'block';
    document.getElementById('deleteTweetId').value = deleteTweetId; 
}

// hide the delete tweet form and overlay
document.getElementById('deleteCancel').addEventListener('click', function() {
    document.getElementById('deleteTweet').style.display = 'none';
    document.getElementsByClassName('overlay')[0].style.display = 'none';
});

</script> -->