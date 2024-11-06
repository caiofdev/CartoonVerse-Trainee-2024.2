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
