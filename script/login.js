const loginButton = document.getElementById('login-button');
const loginPopupCard = document.querySelector('.login-popup-card');
const continueButton = document.querySelector('#login-continue-button');
const overlay = document.querySelector('.overlay');

if (typeof loginSuccess !== 'undefined' && loginSuccess) {
    overlay.style.display = 'block';
    loginPopupCard.style.display = 'block';
    loginPopupCard.style.transform = 'translate(-50%, -100%)';
    setTimeout(() => {
        loginPopupCard.style.transform = 'translate(-50%, 0)';
    }, 100);
}

continueButton.addEventListener('click', () => {
    overlay.style.display = 'none';
    loginPopupCard.style.display = 'none';
    loginPopupCard.style.transform = 'translate(-50%, -100%)';
    setTimeout(() => {
        overlay.style.display = 'none';
        loginPopupCard.style.display = 'none';
    }, 500);
});
