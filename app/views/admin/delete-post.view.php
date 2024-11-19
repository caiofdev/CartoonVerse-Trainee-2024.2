<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CartoonVerse</title>
    <link rel="stylesheet" href="/public/css/delete-post.css" />
  </head>
  <body>
    <div class="general-container">
      <div class="janela-principal">
        <a class="close" href="post-list.html">&times;</a>
        <h1>Tem certeza que deseja excluir o post?</h1>
        <div class="botoes">
          <a href="post-list.html">
            <div id="nao">Cancelar</div>
          </a>
          <form action="delete-post" method="POST">
            <button type="submit" id="sim" name="id" value="<?= $_GET['id'] ?>">Excluir</button>
          </form>
        </div>
      </div>
    </div>
    <script src="/public/js/delete-post.js"></script>
  </body>
</html>
