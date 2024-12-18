<head>
  <link rel="stylesheet" href="../../../../public/css/fonts.css">
  <link rel="stylesheet" href="../../../../public/css/editar-user.css">
</head>

<div id="modalEditar-<?=$user->id?>" class="modal hidden">
      <div class="modal-content-editar">
        <span class="close" id="closeEditar" onclick="fecharModal('modalEditar-<?=$user->id?>')"
          >&times;</span
        >
        <h1>EDITAR USUARIO</h1>
        <div class="modal-body">
            <div class="modal-form">
                <form action="/admin/users/update" 
                method="POST" 
                enctype="multipart/form-data" 
                id="modalEditar-<?=$user->id?>" 
                data-modal-id="modalEditar-<?=$user->id?>"
                autocomplete="off"
                >
                
                    <input type="hidden" name="id" value="<?=$user->id?>">
                    
                    <!-- Imagem do usuário -->
                    <div class="form-group">
                        <div class="input-group">
                            <input type="file" 
                                value="<?=$user->image?>"
                                id="image-<?=$user->id?>" 
                                name="image" 
                                accept="image/png,image/jpeg,image/jpg" 
                                class="input-image">
                        </div>
                    </div>

                    <div class="input-group">
                        <input type="text" 
                               name="name" 
                               value="<?=$user->name?>" 
                               placeholder="Nome" 
                               required>
                    </div>

                    <!-- Erro email -->
                    <p class="error-message" style="display:none; color:red;"></p>
                    
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