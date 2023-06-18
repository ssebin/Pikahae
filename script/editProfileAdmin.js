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

/* save edit and its pop-up message display*/
const overlay = document.createElement('div');
overlay.classList.add('submit-btn-overlay');

const messageBox = document.createElement('div');
messageBox.classList.add('message-box');

const image = document.createElement('img');
image.src = '../images/other/pop-up-pic.jpg';
image.style.width = '200px';
image.style.height = '155px';

const messageText = document.createElement('p');
messageText.textContent = 'Profile saved!';
messageText.style.marginTop = '30px'; 

const closeButton = document.createElement('span');
closeButton.classList.add('close-button');
closeButton.textContent = 'Close';
closeButton.style.marginTop = '16px'; 

messageBox.appendChild(image);
messageBox.appendChild(messageText);
messageBox.appendChild(closeButton);
overlay.appendChild(messageBox);

/* save edit*/
document.addEventListener('DOMContentLoaded', function() {
    const saveButton = document.querySelector('.save-edit');
    saveButton.addEventListener('click', function() {
        document.body.appendChild(overlay); // Add the overlay to the page
        overlay.style.display = 'block'; // Show the overlay
    });
});

closeButton.addEventListener('click', function() {
    overlay.style.display = 'none'; // Hide the overlay
    var emailContent = document.getElementById("email").textContent;
        var birthdayContent = document.getElementById("birthday").value; 
        var pokemonContent = document.getElementById("favorite-pokemon").value;
    
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update-profile.php", true); // Update the PHP file name
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response from the server if needed
            console.log(xhr.responseText);
            }
        };
        xhr.send("email=" + encodeURIComponent(emailContent) + "&birthday=" + encodeURIComponent(birthdayContent) + "&favorite_pokemon=" + encodeURIComponent(pokemonContent));
    window.location.href = 'customer_accounts.php'; 
});

/* cancel edit*/
document.addEventListener('DOMContentLoaded', function() {
    const cancelButton = document.querySelector('.cancel-edit');
    cancelButton.addEventListener('click', function() {
      // Redirect to "view profile" page
      window.location.href = 'customer_accounts.php'; 
    });
});

/*delete acc*/
document.addEventListener('DOMContentLoaded', function() {
    const deleteButton = document.querySelector('.delete-account');
    const confirmationBox = document.querySelector('#confirmationBox');
    const confirmYesButton = document.querySelector('#confirmYes');
    const confirmNoButton = document.querySelector('#confirmNo');

    deleteButton.addEventListener('click', function() {
        confirmationBox.style.display = 'block';
    });

    confirmYesButton.addEventListener('click', function() {
        confirmationBox.style.display = 'none';
        image.src = '../images/other/pokemon-bye-bye.jpg';
        image.style.width = '200px';
        image.style.height = '155px';   
        messageText.textContent = 'Account is successfully deleted.';
        messageBox.appendChild(image);
        messageBox.appendChild(messageText);
        messageBox.appendChild(closeButton);
        overlay.appendChild(messageBox);
        document.body.appendChild(overlay); // Add the overlay to the page
        overlay.style.display = 'block'; // Show the overlay
        closeButton.addEventListener('click', function() {
            overlay.style.display = 'none'; // Hide the overlay
            fetch('delete-account.php', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
                }
              })
                .then(response => response.text())
                .then(data => {
                  // Handle the response from the server
                  console.log(data);
                })
                .catch(error => {
                  // Handle errors
                  console.error(error);
                });
            window.location.href = 'customer_accounts.php'; 
        });
    });

    confirmNoButton.addEventListener('click', function() {
        confirmationBox.style.display = 'none';
    });
});


  
