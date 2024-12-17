<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CartoonVerse</title>
    <link rel="stylesheet" href="/public/css/delete-post.css" />
  </head>
  <body>
    <div id="modalDeletePost-<?= $post->id ?>" class="modal-delete-post">
      <div class="modal-content-delete-post">
        <a class="close-delete-post" onclick="fecharModal('modalDeletePost-<?= $post->id ?>')">&times;</a>
        <h1>Tem certeza que deseja<br>excluir este post?</h1>
        <p>Ao clicar em excluir, este post será permanentemente excluído!</p>
        <div class="botoes-delete-post">
          <button class="fechar-delete-post" type="button" onclick="fecharModal('modalDeletePost-<?= $post->id ?>')">Cancelar</button>
          <form action="delete-post" method="post" class="modal-form">
            <button type="submit" name="id" class="excluir-delete-post" value="<?= $post->id ?>">Excluir</button>
          </form>
        </div>
      </div>
    </div>
    <script src="/public/js/modais.js"></script>
  </body>
</html>
