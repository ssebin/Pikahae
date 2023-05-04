/* cancel edit and its pop-up message display*/
const myButton = document.querySelector('.send-message');
const overlay = document.createElement('div');
overlay.classList.add('submit-btn-overlay');

const messageBox = document.createElement('div');
messageBox.classList.add('message-box');

const image = document.createElement('img');
image.src = '../images/other/pop-up-pic.jpg';
image.style.width = '200px';
image.style.height = '155px';

const messageText = document.createElement('p');
messageText.textContent = 'Your message has been sent!';
messageText.style.marginTop = '30px'; 

const closeButton = document.createElement('span');
closeButton.classList.add('close-button');
closeButton.textContent = 'Close';
closeButton.style.marginTop = '16px'; 

messageBox.appendChild(image);
messageBox.appendChild(messageText);
messageBox.appendChild(closeButton);
overlay.appendChild(messageBox);

myButton.addEventListener('click', function() {
  document.body.appendChild(overlay); // Add the overlay to the page
  overlay.style.display = 'block'; // Show the overlay
});

closeButton.addEventListener('click', function() {
  overlay.style.display = 'none'; // Hide the overlay
});
