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
  const modais = [...document.getElementsByClassName("modal"), ...document.getElementsByClassName("modal-excluir")]
  for (let modal of modais) {
    if (event.target === modal) {
      modal.style.display = "none"
    }
  }
}

// Função para mostrar erro no modal
// function mostrarErroModal(id, mensagem) {
//   const modal = document.getElementById(id);
//   const erroElemento = modal.querySelector('.error-message');
//   erroElemento.textContent = mensagem;
//   erroElemento.style.display = 'block';
// }

// document.querySelectorAll('form').forEach(form => {
//   form.addEventListener('submit', function(e) {
//     e.preventDefault();
//     const formData = new FormData(this);

//     fetch(this.action, {
//       method: 'POST',
//       body: formData
//     })
//     .then(response => response.json())
//     .then(data => {
//       if (data.error) {
//         const modalId = this.dataset.modalId;
//         mostrarErroModal(modalId, data.error);
//       } else {
//         location.reload();
//       }
//     })
//     .catch(error => console.error('Error:', error));
//   });
// });