const firstNameInput = document.getElementById('fname');
const lastNameInput = document.getElementById('lname');
const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');
const registerButton = document.getElementById('register-btn');

const nameInputAlert = document.getElementById('name-input-alert');
const usernameInputAlert = document.getElementById('username-input-alert');
const confirmPasswordInput = document.getElementById('confirmPassword');
const passwordRequirementAlert = document.getElementById('password-requirement-alert');
const passwordMatchAlert = document.getElementById('password-match-alert');

const nameRegex = /^[A-Za-z]+$/; // regex for alphabetical characters only

let isFirstNameValid = false;
let isLastNameValid = false;
let isUsernameValid = false;
let isPasswordValid = false;

firstNameInput.addEventListener('input', () => {
  if (!nameRegex.test(firstNameInput.value)) {
    nameInputAlert.style.display = 'inline';
  } else {
    nameInputAlert.style.display = 'none';
  }
  enableRegisterButton();
});

lastNameInput.addEventListener('input', () => {
  if (!nameRegex.test(lastNameInput.value)) {
    nameInputAlert.style.display = 'inline';
  } else {
    nameInputAlert.style.display = 'none';
  }
});

usernameInput.addEventListener('input', () => {
  if (usernameInput.value.length < 4) {
    usernameInputAlert.style.display = 'inline';
  } else {
    usernameInputAlert.style.display = 'none';
  }
  enableRegisterButton();
});

confirmPasswordInput.addEventListener('input', function() {
  if (confirmPasswordInput.value !== passwordInput.value) {
    passwordMatchAlert.style.display = 'inline';
  } else {
    passwordMatchAlert.style.display = 'none';
  }
  enableRegisterButton();
});

passwordInput.addEventListener('input', () => {
    const password = passwordInput.value;
    const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]{8,}$/;
    if (!passwordRegex.test(password)) {
      passwordRequirementAlert.style.display = 'inline';
    } else {
        passwordRequirementAlert.style.display = 'none';
    }
    enableRegisterButton();
  });

  function enableRegisterButton() {
    if (isFirstNameValid && isLastNameValid && isUsernameValid && isPasswordValid) {
      registerButton.disabled = false;
    } else {
      registerButton.disabled = true;
    }
  }