<!-- Author: Yuchen Wang -->

<?php
include 'session_checker.php'; 
include 'db_connection.php';
$userIdbySession = $_SESSION['user_id'];
// ===============PHP============
//   =======top area======
//  get data from database
$sql = "SELECT name,description
            FROM twitter_user
            WHERE id = $userIdbySession";
    $result = $conn ->query($sql);

    if($result -> num_rows > 0){
        $row = $result ->fetch_assoc();
    }

// save profile to database
    if(isset($_POST['saveProfile'])) {
        // Retrieve data from the form
        $set_name = $_POST['editName'];
        // let user use ' 
        $set_description = mysqli_real_escape_string($conn, $_POST['editDescription']); // Escape special characters

    
        // Update the user's data in the database
        $sqlUpdate = "UPDATE twitter_user 
                      SET name = '$set_name',
                          description = '$set_description'
                      WHERE id = $userIdbySession";
        if ($conn->query($sqlUpdate) === TRUE) {
            echo "Data has been successfully updated in the database.";
            header("Location: profile.php");
        } else {
            echo "Error updating data: " . $conn->error;
        }
    }  
//           =======modify tweets======
    if(isset($_POST['postSubmit'])) {
        // Retrieve data from the form
        $set_text = $_POST['postContent'];
        $tweetId = $_POST['tweetId'];

        $sqlUpdate_tweets = "UPDATE tweets 
                            SET text = '$set_text'
                            WHERE id = '$tweetId'";
        if ($conn->query($sqlUpdate_tweets) === TRUE) {
            echo "Data has been successfully updated in the database.";
            header("Location: profile.php");;
        } else {
            echo "Error updating data: " . $conn->error;
            
        }
    }  
//          ========delete tweets==========
if(isset($_POST['deleteButton'])){
    $tweetDeleteId = $_POST['deleteTweetId'];

    // delete likes
    $sql_delete_likes = "DELETE FROM likes WHERE tweetid = $tweetDeleteId";
    if($conn->query($sql_delete_likes) === true) {
        // delete tweet
        $sql_delete_tweet = "DELETE FROM tweets WHERE id = $tweetDeleteId";
        if($conn->query($sql_delete_tweet) === true){
            echo "Successfully deleted tweet."; 
            header("Location: profile.php");
        } else {
            echo "Error deleting tweet: " . $conn->error;
        }
    } else {
        echo "Error deleting likes: " . $conn->error;
    }
}
?>