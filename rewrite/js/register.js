// --- js/register.js ---
// Handles client-side interactions and validation for the registration form.

document.addEventListener('DOMContentLoaded', function() {
    
    // --- Password Visibility Toggle ---
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
    
    // --- Inline Form Validation ---
    const form = document.getElementById('register-form');
    const emailInput = document.getElementById('email');
    const emailValidationMessage = document.getElementById('email-validation');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    // Function to show a validation message
    function showValidationMessage(element, message) {
        element.textContent = message;
    }
    
    // Function to clear a validation message
    function clearValidationMessage(element) {
        element.textContent = '';
    }
    
    // Email validation on input
    if (emailInput && emailValidationMessage) {
        emailInput.addEventListener('input', function() {
            if (!emailInput.value) {
                clearValidationMessage(emailValidationMessage);
            } else if (!emailRegex.test(emailInput.value)) {
                showValidationMessage(emailValidationMessage, 'Please enter a valid email address.');
            } else {
                clearValidationMessage(emailValidationMessage);
            }
        });
    }

    // Overall form validation on submit
    if (form) {
        form.addEventListener('submit', function(event) {
            let isValid = true;
            
            // Check required fields
            const requiredInputs = form.querySelectorAll('[required]');
            requiredInputs.forEach(input => {
                const validationMessageEl = document.getElementById(`${input.id}-validation`);
                if (!input.value.trim()) {
                    isValid = false;
                    if (validationMessageEl) {
                        showValidationMessage(validationMessageEl, `Your ${input.labels[0].textContent.toLowerCase()} is required.`);
                    }
                } else if (validationMessageEl) {
                     // Clear previous 'required' message if now filled
                     if (validationMessageEl.textContent.includes('required')) {
                        clearValidationMessage(validationMessageEl);
                     }
                }
            });

            // Re-check email format on submit
            if (emailInput.value && !emailRegex.test(emailInput.value)) {
                 isValid = false;
                 showValidationMessage(emailValidationMessage, 'Please enter a valid email address.');
            }
            
            if (!isValid) {
                event.preventDefault(); // Stop form submission
            }
        });
    }
});
