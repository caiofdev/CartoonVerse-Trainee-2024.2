<head>
  <link rel="stylesheet" href="../../../../public/css/fonts.css">
  <link rel="stylesheet" href="../../../../public/css/criar-user.css">
</head>

<div id="modalCriar" class="modal">
    <div class="modal-content">
      <span class="close" id="closeCriar" onclick="fecharModal('modalCriar')"
        >&times;</span
      >
      <div class="modal-body">
        <!-- Campos de Entrada -->
         <div class="modal-form">
          <form action="users/create" method="POST" class="modal-form" id="new-user" novalidate>
            <!-- Imagem do usuário -->
             <div >
              <label for="input-image" class="user-image" tabindex="0" id="image">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
              </label>
              <input type="file" accept="image/png,image/jpeg, image/jpg" class="input-image" form="new-user" name="image" id="input-image" required tabindex="0">
            <div class="input-group" id="first">
              <input type="text" placeholder="Nome" form="new-user" name="name" required tabindex="0"/>
            </div>
            <div class="input-group">
              <input type="email" placeholder="Email" form="new-user" name="email" required tabindex="0"/>
            </div>
            <div class="input-group">
              <input type="password" placeholder="Senha" form="new-user" name="password" required tabindex="0"/>
            
            </div>
            <!-- Botões de Ação -->
            <div class="modal-buttons">
              <button class="cancel" onclick="fecharModal('modalCriar')" form="new-user"  formnovalidate type="button" tabindex="0">
                Cancelar
              </button>
              <button class="confirm" form="new-user" formmethod="post" type="submit" tabindex="0">Confirmar</button>
            </div>
          </form>
          </div>
         </div>
      </div>
    </div>
  </div>

<script src="../../../../public/js/modais.js"></script>