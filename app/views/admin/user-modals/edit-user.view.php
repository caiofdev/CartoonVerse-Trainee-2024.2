<div id="modalEditar-<?=$user->id ?? '1'?>" class="modal">
      <div class="modal-content">
        <span class="close" id="closeEditar" onclick="fecharModal('modalEditar-<?=$user->id?>')"
          >&times;</span
        >
        <div class="modal-body">
          <!-- Campos de Entrada -->
           <div class="modal-form">
            <form action="users/update" method="POST" class="modal-form" id="edit-user">
              <!-- Imagem do usuário -->
                <label for="input-image" class="user-image" tabindex="0" id="image">
                  <img src="<?=$user->image?>" alt="Imagem de <?=$user->name?>">
                </label>
                <input type="file" accept="image/png,image/jpeg, image/jpg" class="input-image" form="edit-user" name="input-image" id="input-image" required>
              <div class="input-group" id="first">
                <input type="text" value="<?=$user->name?>" placeholder="Nome" form="edit-user" required/>
              </div>
              <div class="input-group">
                <input type="email" value="<?=$user->email?>" placeholder="Email" form="edit-user" required/>
              </div>
              <div class="input-group">
                <input type="" value="<?=$user->password?>" placeholder="Senha" form="edit-user" required/>
              </div>
              <!-- Botões de Ação -->
              <div class="modal-buttons">
                <button class="cancel" onclick="fecharModal('modalEditar-<?=$user->id?>')" form="edit-user"  formnovalidate type="button">
                  Cancelar
                </button>
                <button class="confirm" form="edit-user" formmethod="post" type="submit">Confirmar</button>
              </div>
            </form>
           </div>
        </div>
      </div>
    </div>