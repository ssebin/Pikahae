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