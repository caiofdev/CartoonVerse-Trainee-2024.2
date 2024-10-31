function trocarShadow() {
  titulo = document.getElementById("titulo");
  px = '2px';
  if ((titulo.style.textShadow.value = "2px 2px #13ACB1")) {
    titulo.style.textShadow.value = px + px + '#7E241E';
  }
  if ((titulo.style.textShadow.value = "2px 2px #7E241E")) {
    titulo.style.textShadow.value = "2px 2px #13ACB1";
  }
}
