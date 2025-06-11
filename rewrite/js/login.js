// --- js/login.js ---
// Handles client-side interactions for the login form.

document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('password-toggle');
    const eyeIcon = document.getElementById('eye');
    const eyeSlashIcon = document.getElementById('eye-slash');

    if (toggleButton && passwordInput) {
        toggleButton.addEventListener('click', function() {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle the eye icons
            if (type === 'password') {
                eyeIcon.style.display = 'block';
                eyeSlashIcon.style.display = 'none';
            } else {
                eyeIcon.style.display = 'none';
                eyeSlashIcon.style.display = 'block';
            }
        });
    }
});
