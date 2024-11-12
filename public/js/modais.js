const inputFile = document.querySelector('#input-image');
const pictureImage = document.querySelector('#image');
const pictureImageTxt = "Perfil";
// pictureImage.innerHTML = pictureImageTxt;

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

// Função para abrir o modal
function abrirModal(id) {
  document.getElementById(id).style.display = "block"
}

// Função para fechar o modal
function fecharModal(id) {
  document.getElementById(id).style.display = "none"
}

// Fecha o modal ao clicar fora dele
window.onclick = function (event) {
  const modais = document.getElementsByClassName("modal")
  for (let modal of modais) {
    if (event.target === modal) {
      modal.style.display = "none"
    }
  }
}
