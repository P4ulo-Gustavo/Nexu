document.addEventListener('DOMContentLoaded', function () {
    const login = document.getElementById('butt_login');

    if (login) {
        login.addEventListener('click', function () {
            window.location.replace('../pages/login.html');
        });
    }
});
