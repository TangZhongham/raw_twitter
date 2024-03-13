

document.addEventListener("DOMContentLoaded", function () {
    var resetButton = document.querySelector('#SignIn');
    resetButton.addEventListener('click', function () {
        resetErrors();
    }); 
});

// Function to validate the form
function validate() {
    var valid = true;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    resetErrors();

    if (!validateEmail(email)) {
        showError('email', 'Email address should be valid.');
        valid = false;
    }

    if (!validatePassword(password)) {
        showError('password', 'Password should be at least 8 characters long.');
        valid = false;
    }
    return valid;
}

// Email textbox value is a valid email structure (xyx@xyz.xyz)
function validateEmail(email){
    var regex = /\S+@\S+\.\S+/;
    return regex.test(email);
}

// Password should be at least 8 characters long
function validatePassword(password){
    return password.length >= 8;
}

// Function to show error message and highlight the field
function showError(inputInfo, errorMessage){
    var errorElement = document.getElementById(inputInfo + 'Error');

    errorElement.textContent = errorMessage;
    errorElement.removeAttribute('hidden');
    errorElement.style.color = 'red';
    errorElement.style.fontSize = '15px' ;
}

// Function to reset error messages
function resetErrors(){
    var errorElements = document.querySelectorAll('.error');
    errorElements.forEach(function (element) {
        element.setAttribute('hidden', true);
        element.style.color = ''; 
        element.style.fontSize = ''; 
    });
}
