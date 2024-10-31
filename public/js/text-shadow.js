function trocarShadow() {
  var titulo = document.getElementById("titulo")
  if ((titulo.style.textShadow = "2px 2px #13ACB1")) {
    titulo.style.textShadow = "2px 2px #7E241E"
  }
  if ((titulo.style.textShadow = "2px 2px #7E241E")) {
    titulo.style.textShadow = "2px 2px #13ACB1"
  }
}
