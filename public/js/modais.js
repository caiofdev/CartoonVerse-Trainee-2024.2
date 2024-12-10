// const inputFileCreatePost = document.getElementById('input-image');
// const pictureImageCreatePost = document.getElementById('label-imagem-create-post');
// const inputFileEditPost = document.querySelectorAll('input.input-image-editar-post');
// const pictureImageEditPost = document.querySelectorAll('label.label-imagem-editar-post');
// const oldChild = querySelectorAll('img.imagemAtual');
// const pictureImageTxt = "Perfil";


// pictureImage.innerHTML = pictureImageTxt;

// inputFileCreatePost.addEventListener('change', function(e) {
//   const inputTarget = e.target;
//   console.log(inputTarget);
//   const file = inputTarget.files[0];

//   if (file) {
//     const container = pictureImageCreatePost;
//     // const oldChild = container.firstElementChild;

//     const reader = new FileReader();

//     reader.addEventListener('load', function(e) {
//       const readerTarget = e.target;

//       const img = document.createElement('img');
//       img.src = readerTarget.result;
//       img.classList.add('perfil-image');

//       pictureImageCreatePost.innerHTML = '';

//       container.appendChild(img);

//       // var d = document.getElementById("image");
//       // var d_interno = document.getElementById("imagem-atual");
//       // var noRemovido = d.removeChild(d_interno);

//       // const atual = document.getElementById("imagem-atual");

//       // replacedNode = pictureImage.replaceChild(img, atual);
            
//       // pictureImage.innerHTML = '';
//       // pictureImage.appendChild(img);

//     });

//     reader.readAsDataURL(file);
//   }
  
// });

// inputFileEditPost.addEventListener('change', function(e) {
//   const inputTarget = e.target;
//   console.log(inputTarget);
//   const file = inputTarget.files[0];

//   if (file) {

//     const reader = new FileReader();

//     reader.addEventListener('load', function(e) {
//       const readerTarget = e.target;

//       const imgNova = document.createElement('img');
//       imgNova.src = readerTarget.result;
//       imgNova.classList.add('perfil-image');

//       // pictureImageCreatePost.innerHTML = '';
//       oldChildEditPost.style.display = "none";
//       container.appendChild(imgNova);

//       // var d = document.getElementById("image");
//       // var d_interno = document.getElementById("imagem-atual");
//       // var noRemovido = d.removeChild(d_interno);

//       // const atual = document.getElementById("imagem-atual");

//       // replacedNode = pictureImage.replaceChild(img, atual);
            
//       // pictureImage.innerHTML = '';
//       // pictureImage.appendChild(img);

//     });

//     reader.readAsDataURL(file);
//   }
  
// });






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

// Função para mostrar erro no modal
function mostrarErroModal(id, mensagem) {
  const modal = document.getElementById(id);
  const erroElemento = modal.querySelector('.error-message');
  erroElemento.textContent = mensagem;
  erroElemento.style.display = 'block';
}

document.querySelectorAll('form').forEach(form => {
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch(this.action, {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        const modalId = this.dataset.modalId;
        mostrarErroModal(modalId, data.error);
      } else {
        location.reload();
      }
    })
    .catch(error => console.error('Error:', error));
  });
});