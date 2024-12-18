const inputFile = document.querySelector('#input-image');
const pictureImage = document.querySelector('#image');
const pictureImageTxt = "Perfil";

inputFile.addEventListener('change', function(e) {
  const inputTarget = e.target;
  console.log(inputTarget);
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener('load', function(e) {
      const readerTarget = e.target;

      const img = document.createElement('img');
      img.src = readerTarget.result;
      img.classList.add('perfil-image');

      pictureImage.innerHTML = '';
      pictureImage.appendChild(img);
    });

    reader.readAsDataURL(file);
  }
  
});