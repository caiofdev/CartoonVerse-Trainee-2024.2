<div id="modalCriar" class="modal">
    <div class="modal-content-criar">
        <span class="close" onclick="fecharModal('modalCriar')">&times;</span>
        <h1>CRIAR USUARIO</h1>
        <div class="modal-body">
            <div class="modal-form">
                <!-- Fix: Add proper action path and enctype -->
                <form action="/admin/users/create" 
                      method="POST" 
                      enctype="multipart/form-data" 
                      id="modalCriar" 
                      data-modal-id="modalCriar"
                      autocomplete="off">
                    
                    <!-- Imagem do usuário -->
                    <div class="input-group">
                        <input type="file" 
                               id="input-image" 
                               name="image" 
                               class="input-image"
                               required 
                               >
                    </div>

                    <div class="input-group">
                        <input type="text" 
                               name="name" 
                               placeholder="Nome" 
                               required>
                    </div>

                    <!-- Erro email -->
                    <p class="error-message" style="display:none; color:red;"></p>

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

<script src="/public/js/modais.js"></script>
<script src="/public/js/upload.js"></script>