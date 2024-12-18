<head>
  <link rel="stylesheet" href="../../../../public/css/fonts.css">
  <link rel="stylesheet" href="../../../../public/css/excluir-user.css">
</head>

<div id="modalExcluir-<?=$user->id ?? '1'?>" class="modal-excluir modal">
    <div class="modal-content-excluir">
        <span class="close" id="closeExcluir" onclick="fecharModal('modalExcluir-<?=$user->id?>')">&times;</span>
        <h1 class="titulo-excluir-usuario">TEM CERTEZA DE QUE DESEJA<br>EXCLUIR ESTE USUÁRIO?</h1>
        <p>Ao clicar em exluir, este usuário será permanentemente excluído!</p>
        <div class="modal-footer">
            <button onclick="fecharModal('modalExcluir-<?=$user->id?>')" class="btn-cancelar">Cancelar</button>
            <form method="POST" action="users/delete" autocomplete="off">
                <input type="hidden" name="id" value="<?=$user->id ?? '1'?>">
                <button type="submit" class="btn-confirmar">Confirmar</button>
            </form>
        </div>
    </div>
</div>