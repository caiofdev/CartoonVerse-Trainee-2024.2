<head>
  <link rel="stylesheet" href="../../../../public/css/fonts.css">
  <link rel="stylesheet" href="../../../../public/css/excluir-user.css">
</head>

<div id="modalExcluir-<?=$user->id ?? '1'?>" class="modal-excluir">
    <div class="modal-content-excluir">
    <span class="close" id="closeExcluir" onclick="fecharModal('modalExcluir-<?=$user->id?>')">&times;</span>
    <p>Tem certeza de que deseja excluir este item?</p>
    <div class="error-message" style="display:none; color:red;"></div>
    <div class="modal-footer">
        <form method="POST" action="users/delete" data-modal-id="modalExcluir-<?=$user->id?>">
            <input type="hidden" name="id" value="<?=$user->id ?? '1'?>">
            <button type="submit" class="btn-confirmar">Confirmar</button>
        </form>
        <button onclick="fecharModal('modalExcluir-<?=$user->id?>')" class="btn-cancelar">Cancelar</button>
    </div>
    </div>
</div>