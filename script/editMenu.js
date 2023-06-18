const inputElement = document.getElementById("item-photo");
const previewElement = document.getElementById("preview");

inputElement.addEventListener("change", (event) => {
  const file = event.target.files[0];
  const reader = new FileReader();

  reader.readAsDataURL(file);
  reader.onload = () => {
    previewElement.src = reader.result;
  };
});

// const cancelEditButton = document.getElementById('cancel-edit-btn');
// const cancelPopupCard = document.querySelector('.cancel-popup-card');
// const cancelConfirmButton = document.querySelector('#cancel-confirm-button');
// const cancelBackButton = document.querySelector('#cancel-back-button');
// const overlay = document.querySelector('.overlay');
//
// cancelEditButton.addEventListener('click', () => {
//     overlay.style.display = 'block';
//     cancelPopupCard.style.display = 'block';
//     cancelPopupCard.style.transform = 'translate(-50%, -100%)';
//     setTimeout(() => {
//         cancelPopupCard.style.transform = 'translate(-50%, 0)';
//     }, 100);
// });
//
// cancelBackButton.addEventListener('click', () => {
//     overlay.style.display = 'none';
//     cancelPopupCard.style.display = 'none';
//     cancelPopupCard.style.transform = 'translate(-50%, -100%)';
//     setTimeout(() => {
//         overlay.style.display = 'none';
//         cancelPopupCard.style.display = 'none';
//     }, 500);
// });
//
// cancelConfirmButton.addEventListener('click', () => {
//     overlay.style.display = 'none';
//     cancelPopupCard.style.display = 'none';
//     cancelPopupCard.style.transform = 'translate(-50%, -100%)';
//     setTimeout(() => {
//         overlay.style.display = 'none';
//         cancelPopupCard.style.display = 'none';
//     }, 500);
// });
//
// const submitEditButton = document.getElementById('submit-edit-btn');
// const savePopupCard = document.querySelector('.save-popup-card');
// const saveConfirmButton = document.querySelector('#save-confirm-button');
// const saveBackButton = document.querySelector('#save-back-button');
//
// submitEditButton.addEventListener('click', () => {
//     overlay.style.display = 'block';
//     savePopupCard.style.display = 'block';
//     savePopupCard.style.transform = 'translate(-50%, -100%)';
//     setTimeout(() => {
//         savePopupCard.style.transform = 'translate(-50%, 0)';
//     }, 100);
// });
//
// saveBackButton.addEventListener('click', () => {
//     overlay.style.display = 'none';
//     savePopupCard.style.display = 'none';
//     savePopupCard.style.transform = 'translate(-50%, -100%)';
//     setTimeout(() => {
//         overlay.style.display = 'none';
//         savePopupCard.style.display = 'none';
//     }, 500);
// });
//
// saveConfirmButton.addEventListener('click', () => {
//     // Add code to save changes here
//     overlay.style.display = 'none';
//     savePopupCard.style.display = 'none';
//     savePopupCard.style.transform = 'translate(-50%, -100%)';
//     setTimeout(() => {
//         overlay.style.display = 'none';
//         savePopupCard.style.display = 'none';
//     }, 500);
// });

