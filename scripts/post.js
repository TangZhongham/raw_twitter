// Author: Zhonghan Tang

// get random avatar
window.onload = function() {
    var defaultAvatar = [
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
    ];
    
    var tweetAvatars = document.getElementsByClassName('p_Photo');

    for (var i = 0; i < tweetAvatars.length; i++) {
        // Get the user's hashed name from the data attribute
        var hashedName = tweetAvatars[i].getAttribute('data-hashed-name');
        // Generate an index based on the first character of the hashed name
        var avatarIndex = parseInt(hashedName.substring(0, 1), 16) % defaultAvatar.length;
        // Set the src attribute of the img element
        tweetAvatars[i].src = defaultAvatar[avatarIndex];
    }
}




document.addEventListener('DOMContentLoaded', function() {
    // Get post form elements
    const postForm = document.getElementById('postForm');
    const postContent = document.getElementById('postContent');
    const postSubmit = document.getElementById('postSubmit');
    const postCancel = document.getElementById('postCancel');
    const postTextArea = document.getElementById('postTextArea');
    const overlay = document.querySelector('.overlay');

    // Function to show post form and overlay
    function showPostForm() {
        postForm.style.display = 'block';
        overlay.style.display = 'block';
        postContent.focus();
        console.log('Text area clicked!');
    }

    // Function to hide post form and overlay
    function hidePostForm() {
        postForm.style.display = 'none';
        overlay.style.display = 'none';
        postContent.value = '';
    }

    // Event listener for text area click
    postTextArea.addEventListener('click', showPostForm);

    // Event listener for post form submit
    // postSubmit.addEventListener('click', () => {
    //     // Get post content
    //     const content = postContent.value.trim();

    //     // Check if content is not empty
    //     if (content !== '') {
    //         // Do something with the post content (e.g., send it to the server)
    //         console.log('Posted:', content);
    //         // Hide post form and overlay after posting
    //         hidePostForm();
    //     } else {
    //         alert('Please enter some content.');
    //     }
    // });

    // Event listener for cancel button click
    postCancel.addEventListener('click', hidePostForm);
});
