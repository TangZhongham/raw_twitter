
<?php
include 'db_connection.php';

// ===============PHP============
//   =======top area======
//  get data from database
$sql = "SELECT name,birthdate,image,description
            FROM twitter_user
            WHERE id = 1";
    $result = $conn ->query($sql);

    if($result -> num_rows > 0){
        $row = $result ->fetch_assoc();
    }

// save profile to database
    if(isset($_POST['saveProfile'])) {
        // Retrieve data from the form
        $set_name = $_POST['editName'];
        $set_birthDay = $_POST['editBirthday'];
        $set_description = $_POST['editDescription'];
    
        // Update the user's data in the database
        $sqlUpdate = "UPDATE twitter_user 
                      SET name = '$set_name',
                          birthdate = '$set_birthDay',
                          description = '$set_description'
                      WHERE id = 1";
        if ($conn->query($sqlUpdate) === TRUE) {
            echo "Data has been successfully updated in the database.";
            echo "<script>window.location.href = window.location.href;</script>";
        } else {
            echo "Error updating data: " . $conn->error;
        }
    }  

    


?>
<!-- ================HTML======================== -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<!-- <script src="profile_new.js"></script> -->
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
                    <p class="p_info  tweet-text" id="birthdayInfo"><?php echo"{$row["birthdate"]}" ?></p>
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
                    $sql_tweet = "SELECT text FROM tweets WHERE userid = 1";
                    $result_tweet = $conn -> query($sql_tweet);

                    if($result_tweet ->num_rows > 0){
                        while ($row_tweet = $result_tweet->fetch_assoc()) {
                            echo '<div class="tweet">';
                            echo '<div class="tweet-content">';
                            echo '<p class="tweet-text">'.$row_tweet['text'].'</p>';
                            echo '</div>';
                            echo '<div class="tweet-modify">';
                            echo '<button class="modify-button tweet-edit">Edit</button>';
                            echo '<button class="modify-button tweet-delete">Delete</button>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No tweets found for the user.";
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- this is the prompt of the top area -->
    <div id="profileEditForm" class="profile-edit-form">
        <form action="" method="post">
            <button id="closeProfileEdit">x</button>
            <input type="text" name="editName" id="editName" class="editinfo" placeholder="Name-- less than 8 characters">
            <input type="text" name="editBirthday" id="editBirthday" class="editinfo" placeholder='Birthday-"DDMMYYYY"'>
            <input type="text" name="editDescription" id="editDescription" class="editinfo" placeholder="Description">
            <input type="submit" name="saveProfile" id="saveProfile" value="save">
        </form>
    </div>
    <div class="overlay"></div>
    <!-- this is the prompt of the tweet
    <div id="postForm" class="post-form">
    <button id="postCancel">X</button>
    <textarea id="postContent" placeholder="What's happening?"></textarea>
    <button id="postSubmit">Post</button> -->
</div>
</body>
</html>




<!-- ==============================JS================================ -->
<script>
function showEditForm() {
    // Display the edit profile form and overlay
    document.getElementById('profileEditForm').style.display = 'block';
    document.getElementsByClassName('overlay')[0].style.display = 'block';

    // Fill the edit form fields with existing user data
    document.getElementById('editName').value = '<?php echo"{$row["name"]}" ?>';
    document.getElementById('editBirthday').value = '<?php echo $row["birthdate"]; ?>';
    document.getElementById('editDescription').value = '<?php echo $row["description"]; ?>';
}

// Function to hide the edit profile form
document.getElementById('closeProfileEdit').addEventListener('click', function() {
    document.getElementById('profileEditForm').style.display = 'none';
    document.getElementsByClassName('overlay')[0].style.display = 'none';
});
</script>


