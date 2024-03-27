<script>
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

</script>