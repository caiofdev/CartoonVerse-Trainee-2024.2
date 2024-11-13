let slideIndex = 1
showSlide(slideIndex)

function currentSlide(n) {
  showSlide((slideIndex = n))
}

function showSlide(n) {
  let slides = document.querySelectorAll(".slide")
  let indicators = document.querySelectorAll(".indicator")

  if (n > slides.length) {
    slideIndex = 1
  }
  if (n < 1) {
    slideIndex = slides.length
  }

  slides.forEach((slide) => (slide.style.display = "none"))
  indicators.forEach((indicator) => indicator.classList.remove("active"))

  slides[slideIndex - 1].style.display = "block"
  indicators[slideIndex - 1].classList.add("active")
}

// Avança automaticamente para o próximo slide a cada 5 segundos
setInterval(() => {
  slideIndex++
  showSlide(slideIndex)
}, 5000)
