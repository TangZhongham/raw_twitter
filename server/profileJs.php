<!-- Author: Yuchen Wang -->
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
            "images/7.jpg",
            "images/8.jpeg",
            "images/9.jpg",
            "images/10.jpg",
            "images/11.jpg",
        ]

        var tweetAvatar = document.getElementById('p_Photo');

        var hashedName = tweetAvatar.getAttribute('data-hashed-name');

        var avatarIndex = parseInt(hashedName.substring(0, 1), 16) % defaultAvatar.length;

        tweetAvatar.src = defaultAvatar[avatarIndex];
        
        // var random_number = Math.floor(Math.random() * defaultAvatar.length - 1);
        // var userAvatar = defaultAvatar[random_number];
        // document.getElementById('p_Photo').src = userAvatar;
        
    }

function showEditForm() {
    // Display the edit profile form and overlay
    document.getElementById('profileEditForm').style.display = 'block';
    document.getElementsByClassName('overlay')[0].style.display = 'block';
    // Fill the edit form fields with existing user data
    document.getElementById('editName').value = '<?php echo"{$row["name"]}" ?>';
    document.getElementById('editDescription').value = '<?php echo htmlspecialchars($row["description"]); ?>';
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