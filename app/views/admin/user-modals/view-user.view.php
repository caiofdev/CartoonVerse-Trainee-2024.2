<head>
  <link rel="stylesheet" href="../../../../public/css/fonts.css">
  <link rel="stylesheet" href="../../../../public/css/visualizar-user.css">
</head>

<div id="modalVisualizar-<?=$user->id ?? '1'?>" class="modal">
    <div class="modal-content">
        <span class="close" id="closeCriar" onclick="fecharModal('modalVisualizar-<?=$user->id?>')">&times;</span>
        <div class="modal-body">
            <!-- Dados do Usuário -->
            <div class="modal-form">
                <form action="users/verify" method="GET" class="modal-form" id="dados-user">
                  
                    <!-- Imagem do usuário -->
                    <label for="dados-image" class="user-image-view" tabindex="0" id="image-view">
                        <img src="<?=($user->image)?>" alt="Imagem de <?=($user->name)?>">
                    </label>
                    <input type="file" accept="image/png,image/jpeg" class="input-image-view" form="dados-user" name="input-image" id="input-image" readonly>
                    <div class="input-group" id="first">
                        <input type="text" placeholder="id" value="<?=($user->id)?>" form="dados-user" readonly/>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Nome" value="<?=($user->name)?>" form="dados-user" readonly/>
                    </div>
                    <div class="input-group">
                        <input type="email" placeholder="Email" value="<?=($user->email)?>" form="dados-user" readonly/>
                    </div>
                    <div class="button-fechar">
                        <button class="fechar" onclick="fecharModal('modalVisualizar-<?=$user->id?>')" form="dados-user" type="button">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>