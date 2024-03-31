// Author: Azadeh Sadeghtehrani

document.addEventListener('DOMContentLoaded', function () {
    // Sign In Popup
    var showLoginBtn = document.getElementById('show-login');
    var signInPopup = document.querySelector('.popup');
    var closeSignInBtn = document.querySelector('.popup .close-btn');

    showLoginBtn.addEventListener('click', function () {
        signInPopup.classList.add('active');
        document.body.classList.add('popup-active');
    });

    closeSignInBtn.addEventListener('click', function () {
        signInPopup.classList.remove('active');
        document.body.classList.remove('popup-active');

    });

    // Sign Up Popup
    var showSignUpBtn = document.getElementById('account1');
    var signUpPopup = document.querySelector('.popup-signup');
    var closeSignUpBtn = document.querySelector('.popup-signup .close-btn-signup');

    showSignUpBtn.addEventListener('click', function () {
        signUpPopup.classList.add('active');
        document.body.classList.add('popup-active');
    });

    closeSignUpBtn.addEventListener('click', function () {
        signUpPopup.classList.remove('active');
        document.body.classList.remove('popup-active');
        clearFields();
    });

    // Form Validation
    var emailInput = document.getElementById('email');
    emailInput.addEventListener('input', function () {
        clearErrors('email');
    });

    var nameInput = document.getElementById('name');
    nameInput.addEventListener('input', function () {
        clearErrors('name');
    });

    var passwordInput = document.getElementById('pass');
    passwordInput.addEventListener('input', function () {
        clearErrors('password');
    });

    var confirmPasswordInput = document.getElementById('pass2');
    confirmPasswordInput.addEventListener('input', function () {
        clearErrors('confirmPassword');
    });

    var signupForm = document.getElementById('signupForm');
    signupForm.addEventListener('submit', function (event) {
        if (!validate()) {
            event.preventDefault(); 
        } 
    });
});

function clearFields() {
    var inputs = document.querySelectorAll('input[type="name"], input[type="email"], input[type="password"]');
    inputs.forEach(function(input) {
        input.value = ''; 
    });
}
// Function to validate the form
function validate() {
    var email = document.getElementById('email');
    var name = document.getElementById('name');
    var password = document.getElementById('pass');
    var confirmPassword = document.getElementById('pass2');
    clearErrors();
    
    var validForm = true;

    // email check
    if (!validateEmail(email.value)) {
        showError(email, 'Email address should be non-empty with the format xyx@xyz.xyz');
        validForm = false;
    }

    // username check
    if (name.value.trim() === "" || (name.value.length > 30)) {
        showError(name, 'User name should be non-empty and within 30 characters.');
        validForm = false;
    }

    // password check
    if (password.value.length < 8 || !/[a-z]/.test(password.value) || !/[A-Z]/.test(pass.value)) { // Corrected pass.value
        showError(password, 'Password should be at least 8 characters long: 1 uppercase, 1 lowercase.');
        validForm = false;
    }

    // password retype check
    if (password.value !== confirmPassword.value || password.value === '') {
        showError(pass2, 'Please match passwords .');
        validForm = false;
    }

    return validForm; //returns true if everything is good
}

function showError(inputElement, errorMessage) { // this function displays an error message associated with a specific input element
    var errorElement = document.createElement("div"); // creates a new <div> element using the .createElement(). This displays the error message
    errorElement.className = "error-message"; // this sets the className of <div>. This allows CSS styling
    errorElement.textContent = errorMessage; // sets the textContent of the <div> to the errorMessage that's provided as an argument of the function. This assigns the actual text content of the error message to be displayed within the <div> element.
  
    inputElement.parentNode.appendChild(errorElement);  //This line appends the <div> (which contains the error message) as a child of the parent node of inputElement. This adds the error message element to the DOM, making it visible within the form.
                                                        //appends means adding and element to the end of another element
         errorElement.style.color = 'red';
         errorElement.style.fontSize = '10px';
                                                                                                
}

function clearErrors() {
    var errorMessages = document.querySelectorAll(".error-message"); //selects all elements in class error-message
    errorMessages.forEach(function (errorMessage) { //.forEach iterates over elements of an array and executes a function (the one below) for each element
        errorMessage.parentNode.removeChild(errorMessage); // removes error mssgs from its parent node, clearing it from the dom (structure of html)
    }); //node is an individual component of the document
}

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}