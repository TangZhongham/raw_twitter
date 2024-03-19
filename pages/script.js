
document.addEventListener('DOMContentLoaded', function () {
    var showLoginBtn = document.getElementById('show-login');
    var popup = document.querySelector('.popup');
    var closeBtn = document.querySelector('.popup .close-btn');

    showLoginBtn.addEventListener('click', function () {
        popup.classList.add('active');
        document.body.classList.add('popup-active'); // Apply gray background
    });

    closeBtn.addEventListener('click', function () {
        popup.classList.remove('active');
        document.body.classList.remove('popup-active'); // Remove gray background
    });
});

