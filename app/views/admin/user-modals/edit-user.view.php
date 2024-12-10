<head>
  <link rel="stylesheet" href="../../../../public/css/fonts.css">
  <link rel="stylesheet" href="../../../../public/css/editar-user.css">
</head>

<div id="modalEditar-<?=$user->id?>" class="modal hidden">
      <div class="modal-content">
        <span class="close" id="closeEditar" onclick="fecharModal('modalEditar-<?=$user->id?>')"
          >&times;</span
        >
        <div class="modal-body">
            <div class="modal-form">
                <form action="/admin/users/update" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$user->id?>">
                    
                    <!-- Imagem do usuário -->
                    <div class="form-group">
                        <label for="image-<?=$user->id?>" class="user-image">
                            <img src="<?=$user->image?>" alt="Imagem de <?=$user->name?>" class="preview-image">
                        </label>
                        <input type="file" 
                               id="image-<?=$user->id?>" 
                               name="image" 
                               accept="image/png,image/jpeg,image/jpg" 
                               class="input-image">
                    </div>

                    <div class="input-group">
                        <input type="text" 
                               name="name" 
                               value="<?=$user->name?>" 
                               placeholder="Nome" 
                               required>
                    </div>

                    <div class="input-group">
                        <input type="email" 
                               name="email" 
                               value="<?=$user->email?>" 
                               placeholder="Email" 
                               required>
                    </div>

                    <div class="input-group">
                        <input type="password" 
                               name="password" 
                               value="<?=$user->password?>" 
                               placeholder="Nova senha" 
                               required>
                    </div>

                    <div class="modal-buttons">
                        <button type="button" 
                                class="cancel" 
                                onclick="fecharModal('modalEditar-<?=$user->id?>')">
                            Cancelar
                        </button>
                        <button type="submit" class="confirm">
                            Confirmar
                        </button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>

<script src="../../../../public/js/modais.js"></script>