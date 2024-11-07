function abrirModal(id) {
  var modal = document.getElementById(id)
  modal.style.display = "flex"
}

function fecharModal(id) {
  var modal = document.getElementById(id)
  modal.style.display = "none"
}

window.onclick = function (event) {
  const modais = document.getElementsByClassName("modal")
  for (let modal of modais) {
    if (event.target === modal) {
      modal.style.display = "none"
    }
  }
}
