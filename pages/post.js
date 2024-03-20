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
    postSubmit.addEventListener('click', () => {
        // Get post content
        const content = postContent.value.trim();

        // Check if content is not empty
        if (content !== '') {
            // Do something with the post content (e.g., send it to the server)
            console.log('Posted:', content);
            // Hide post form and overlay after posting
            hidePostForm();
        } else {
            alert('Please enter some content.');
        }
    });

    // Event listener for cancel button click
    postCancel.addEventListener('click', hidePostForm);
});
