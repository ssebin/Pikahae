const firstNameInput = document.getElementById('fname');
const lastNameInput = document.getElementById('lname');
const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');

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
    isFirstNameValid = false;
  } else {
    nameInputAlert.style.display = 'none';
    isFirstNameValid = true;
  }
});

lastNameInput.addEventListener('input', () => {
  if (!nameRegex.test(lastNameInput.value)) {
    nameInputAlert.style.display = 'inline';
    isLastNameValid = false;
  } else {
    nameInputAlert.style.display = 'none';
    isLastNameValid = true;
  }
});

usernameInput.addEventListener('input', () => {
  if (usernameInput.value.length < 4) {
    usernameInputAlert.style.display = 'inline';
    isUsernameValid = false;
  } else {
    usernameInputAlert.style.display = 'none';
    isUsernameValid = true;
  }
});

confirmPasswordInput.addEventListener('input', function() {
  if (confirmPasswordInput.value !== passwordInput.value) {
    passwordMatchAlert.style.display = 'inline';
    isPasswordValid = false;
  } else {
    passwordMatchAlert.style.display = 'none';
    isPasswordValid = true;
  }
});

passwordInput.addEventListener('input', () => {
  const password = passwordInput.value;
  const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]{8,}$/;
  if (!passwordRegex.test(password)) {
    passwordRequirementAlert.style.display = 'inline';
    isPasswordValid = false;
  } else {
    passwordRequirementAlert.style.display = 'none';
    isPasswordValid = true;
  }
});

const loginButton = document.getElementById('register-btn')
const loginPopupCard = document.querySelector('.login-popup-card');
const continueButton = document.querySelector('#login-continue-button');
const overlay = document.querySelector('.overlay');

loginButton.addEventListener('click', () => {
  if (isFirstNameValid && isLastNameValid && isUsernameValid && isPasswordValid) {
    overlay.style.display = 'block';
    loginPopupCard.style.display = 'block';
    loginPopupCard.style.transform = 'translate(-50%, -100%)';
    setTimeout(() => {
      loginPopupCard.style.transform = 'translate(-50%, 0)';
    }, 100);
  }
});

continueButton.addEventListener('click', () => {
  overlay.style.display = 'none';
  loginPopupCard.style.display = 'none';
  loginPopupCard.style.transform = 'translate(-50%, -100%)';
  setTimeout(() => {
    overlay.style.display = 'none';
    loginPopupCard.style.display = 'none';
  }, 500);
});


