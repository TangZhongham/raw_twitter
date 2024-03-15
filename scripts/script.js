document.addEventListener('DOMContentLoaded', function () {
    var createAccountBtn = document.getElementById('createAccountBtn');
    var modal = document.getElementById('myModal');
    var closeModalBtn = document.getElementsByClassName('close')[0];

    createAccountBtn.addEventListener('click', function () {
        modal.style.display = 'block';
    });

    closeModalBtn.addEventListener('click', function () {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });

    var signupForm = document.getElementById('signupForm');
    signupForm.addEventListener('submit', function (event) {
        event.preventDefault();
        console.log('Form submitted!');
        modal.style.display = 'none';
    });
});

