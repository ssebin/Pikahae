const imgDiv = document.querySelector('.profile-wrapper');
const img = document.querySelector('#ProfilePicture');
const file = document.querySelector('#file-upload');
const uploadBtn = document.querySelector('#upload-btn');

imgDiv.addEventListener('mouseleave', function(){
    uploadBtn.style.display = "block";
});

file.addEventListener('change', function(){
    const choosedFile = this.files[0];  

    if(choosedFile) {
        const reader = new FileReader();
        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
            img.style.width = '12.5rem';
            img.style.height = '12.5rem';
            img.style.borderRadius = "50%";
        });

        reader.readAsDataURL(choosedFile);
    }
});

/* save edit*/
document.addEventListener('DOMContentLoaded', function() {
    const saveButton = document.querySelector('.save-edit');
    saveButton.addEventListener('click', function() {
      // Save changes to user profile
      // Redirect to "view profile" page
      alert('Profile saved successfully!');
      window.location.href = 'view-profile.html'; 
    });
});

/* cancel edit*/
document.addEventListener('DOMContentLoaded', function() {
    const saveButton = document.querySelector('.cancel-edit');
    saveButton.addEventListener('click', function() {
      // Redirect to "view profile" page
      window.location.href = 'view-profile.html'; 
    });
});

/* delete account*/
document.addEventListener('DOMContentLoaded', function() {
    const saveButton = document.querySelector('.delete-account');
    saveButton.addEventListener('click', function() {
        const confirmed = confirm('Are you sure you want to delete your account?');
        if (confirmed) {
            // Delete user account
            // Redirect to login page
            alert('Your account is successfully deleted.');
            window.location.href = 'login.html'; 
        }
    });
});


  
