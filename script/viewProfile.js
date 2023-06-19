document.addEventListener('DOMContentLoaded', function() {
    const saveButton = document.querySelector('.profile-button');
    saveButton.addEventListener('click', function() {
      window.location.href = 'edit-profile.html'; 
    });
  });