document.getElementById("arrow").addEventListener("click", function () {
  document.getElementById("sidebar").classList.toggle("open-sidebar")
})

const sb = document.getElementById("sidebar")
const sbc = document.getElementById("sidebar-content")
document.getElementById("hamburguer").addEventListener("click", function () {
  if (sb.style.backgroundColor !== "var(--fundo)") {
      sb.style.backgroundColor = "var(--fundo)"
      sbc.style.display = "flex"
      document.getElementById("sidebar").classList.add("open-sidebar")
  } else {
      document.getElementById("sidebar").classList.remove("open-sidebar")
    sb.style.backgroundColor = "transparent"
    sbc.style.display = "none"
  }
})

/* const viewportWidth = window.innerWidth
const viewportHeight = window.innerHeight

if ((window.innerWidth) >= 769){
   document.getElementById("sidebar").classList.add("open-sidebar")
   sb.style.backgroundColor = "var(--fundo)"
   sbc.style.display = "flex"
}
if ((window.innerWidth) < 769) {
      sb.style.backgroundColor = "transparent"
      sbc.style.display = "none"
      document.getElementById("sidebar").classList.remove("open-sidebar")
} */
