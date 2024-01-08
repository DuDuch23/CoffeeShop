document.addEventListener('DOMContentLoaded', function() {
    const togglePasswordButton = document.getElementById('togglePassword');
    const passwordInput = document.querySelector('.password-toggle');

    togglePasswordButton.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
});