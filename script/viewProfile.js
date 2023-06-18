var xhr = new XMLHttpRequest();
xhr.open("GET", "http://localhost/Pikahae-Re/Pikahae/images/pokecafe-bg.jpg");
xhr.responseType = "blob";
xhr.onload = response;
xhr.send();

function response(e) {
  var urlCreator = window.URL || window.webkitURL;
  var imageUrl = urlCreator.createObjectURL(this.response);
  document.querySelector("#profile_img").src = imageUrl;
}

document.addEventListener('DOMContentLoaded', function() {
    const saveButton = document.querySelector('.profile-button');
    saveButton.addEventListener('click', function() {
      window.location.href = 'edit-profile.html'; 
    });
  });