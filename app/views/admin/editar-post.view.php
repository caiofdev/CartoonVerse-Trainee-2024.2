<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/fonts.css">
  <link rel="stylesheet" href="/public/css/editar-post.css">
  <title>CartoonVerse</title>
</head>
<body>
  <!-- Modal de Criar -->
    <div id="modalEditarPost-<?= $post->id ?>" class="modal-editar-post">
      <div class="modal-content-editar-post">
        <span class="close-editar-post" id="closeCriar" onclick="fecharModal('modalEditarPost-<?= $post->id ?>')"
          >&times;</span
        >
        <div class="modal-body-editar-post">
          <!-- Dados do post -->
           <div class="modal-form">
            <form action="editar-post" method="post" enctype="multipart/form-data" class="modal-form" id="dados-user">
              <div class="input-group-editar-post" id="id">
                <input type="text" placeholder="ID" value="<?=$post->id?>" 
                name="id"/>
              </div>
              <div class="input-group-editar-post" id="Título">
                <input type="text" placeholder="Título" value="<?=$post->title?>" 
                name="title" required/>
              </div>
              <div class="input-group-editar-post">
                <textarea
                  id="conteudo"
                  name="content"
                  rows="5"
                  placeholder="Conteúdo"
                  required
                ><?=$post->content?></textarea>
              </div>
              <!-- Imagem do post -->
              <div class="input-group-editar-post">
                <input
                  type="file"
                  class="input-image-editar-post input-image"
                  id="input-image"
                  name="image"
                  value="<?=$post->image?>"
                />
              </div>
              <div class="input-group-editar-post">
                <input type="text" placeholder="Autor" value="<?=$post->author?>" name="author" readonly/>
              </div>
              <div class="input-group-editar-post">
                <input type="date" name="created_at" placeholder="Data de Criação" value="<?=$post->created_at?>" id="data-criacao" readonly/>
              </div>
              <div class="button-editar-post">
                <button class="fechar-editar-post" onclick="fecharModal('modalEditarPost-<?= $post->id ?>')" type="button">Fechar</button>
                <button type="submit" class="confirmar-editar-post">
                   Confirmar
                </button>
              </div>
            </form>
           </div>
        </div>
      </div>
    </div>
</body>
<script src="/public/js/modais.js"></script>
</html>