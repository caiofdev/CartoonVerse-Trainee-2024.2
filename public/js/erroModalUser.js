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