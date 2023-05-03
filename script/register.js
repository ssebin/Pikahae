const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirmPassword');
const passwordRequirementAlert = document.getElementById('password-requirement-alert');
const passwordMatchAlert = document.getElementById('password-match-alert');

confirmPasswordInput.addEventListener('input', function() {
  if (confirmPasswordInput.value !== passwordInput.value) {
    passwordMatchAlert.style.display = 'inline';
  } else {
    passwordMatchAlert.style.display = 'none';
  }
});

passwordInput.addEventListener('input', () => {
    const password = passwordInput.value;
    const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]{8,}$/;
    if (!passwordRegex.test(password)) {
      passwordRequirementAlert.style.display = 'inline';
    } else {
        passwordRequirementAlert.style.display = 'none';
    }
  });