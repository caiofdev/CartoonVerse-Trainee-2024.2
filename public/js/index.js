let currentSlide = 0

function showSlide(slideIndex) {
  const slides = document.querySelectorAll(".carrossel-item")
  if (slideIndex >= slides.length) {
    currentSlide = 0
  }
  if (slideIndex < 0) {
    currentSlide = slides.length - 1
  }

  slides.forEach((slide, index) => {
    slide.classList.remove("active")
    if (index === currentSlide) {
      slide.classList.add("active")
    }
  })

  const carrossel = document.querySelector(".carrossel")
  carrossel.style.transform = `translateX(-${currentSlide * 100}%)`
}

function nextSlide() {
  currentSlide++
  showSlide(currentSlide)
}

function previousSlide() {
  currentSlide--
  showSlide(currentSlide)
}

// Exibir o primeiro slide ao carregar
showSlide(currentSlide)
