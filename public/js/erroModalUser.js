function mostrarErroModal(id, mensagem) {
  const modal = document.getElementById(id);
  if (!modal) {
    console.error(`Modal with id ${id} not found.`);
    return;
  }
  const erroElemento = modal.querySelector('.error-message');
  if (!erroElemento) {
    console.error(`Error message element not found in modal with id ${id}.`);
    return;
  }
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
    .then(response => response.text())
    .then(text => {
      let data;
      try {
        data = JSON.parse(text);
      } catch (error) {
        console.error('Error parsing JSON:', error);
        console.error('Raw response text:', text); // debugging
        mostrarErroModal(this.dataset.modalId, 'Erro inesperado. Tente novamente mais tarde.');
        return;
      }
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