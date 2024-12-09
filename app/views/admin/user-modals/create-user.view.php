<div id="modalCriar" class="modal">
    <div class="modal-content">
        <span class="close" onclick="fecharModal('modalCriar')">&times;</span>
        <div class="modal-body">
            <div class="modal-form">
                <!-- Fix: Add proper action path and enctype -->
                <form action="/admin/users/create" 
                      method="POST" 
                      enctype="multipart/form-data" 
                      id="new-user">
                    
                    <!-- Imagem do usuário -->
                    <div class="form-group">
                        <label for="input-image" class="user-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                            </svg>
                        </label>
                        <p>
                        <?php 
                            if(isset($_SESSION['erro-imagem']))
                            echo $_SESSION['erro-imagem'];
                            
                            unset($_SESSION['erro-imagem']);
                        ?>
                        </p>
                        <input type="file" 
                               id="input-image" 
                               name="image" 
                               class="input-image" >
                    </div>

                    <div class="input-group">
                        <input type="text" 
                               name="name" 
                               placeholder="Nome" 
                               required>
                    </div>

                    <div class="input-group">
                        <input type="email" 
                               name="email" 
                               placeholder="Email" 
                               required>
                    </div>

                    <div class="input-group">
                        <input type="password" 
                               name="password" 
                               placeholder="Senha" 
                               required>
                    </div>

                    <div class="modal-buttons">
                        <button type="button" 
                                class="cancel" 
                                onclick="fecharModal('modalCriar')">
                            Cancelar
                        </button>
                        <button type="submit" 
                                class="confirm">
                            Confirmar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../../../../public/js/modais.js"></script>