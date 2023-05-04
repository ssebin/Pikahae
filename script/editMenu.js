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
