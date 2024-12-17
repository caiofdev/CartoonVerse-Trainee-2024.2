<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/fonts.css">
  <link rel="stylesheet" href="/public/css/visualizar-post.css">
  <title>CartoonVerse</title>
</head>
<body>
  <!-- Modal de Visualizar -->
    <div id="modalVisualizarPost-<?= $post->id ?>" class="modal-visualizar-post">
      <div class="modal-content-visualizar-post">
        <span class="close-visualizar-post" id="closeCriar" onclick="fecharModal('modalVisualizarPost-<?= $post->id ?>')"
          >&times;</span
        >
        <h1>VISUALIZAR POST</h1>
        <div class="modal-body-visualizar-post">
          <!-- Dados do post -->
           <div class="modal-form">
            <form action="" method="POST" enctype="multipart/form-data" class="modal-form" id="dados-user">
              <div class="input-group-visualizar-post" id="id">
                <input type="text" placeholder="ID" value="<?=$post->id?>" form="dados-user" readonly/>
              </div>
              <div class="input-group-visualizar-post" id="Título">
                <input type="text" placeholder="Título" class="input-titulo-visualizar-post" value="<?=$post->title?>" form="dados-user" readonly/>
              </div>
              <div class="input-group-visualizar-post">
                <textarea
                  id="conteudo"
                  name="conteudo"
                  rows="5"
                  placeholder="Conteúdo"
                  readonly
                ><?=$post->content?></textarea>
              </div>
              <!-- Imagem do post -->
                <label for="dados-image" class="user-image-visualizar-post" tabindex="0" id="image-visualizar-post">
                  <img src="<?= ($post->image)?>" alt="Imagem de <?= ($post->title)?>">
                </label>
              <div class="input-group-visualizar-post">
                <input type="text" placeholder="Autor" value="<?= $post->author ?>" form="dados-user" readonly/>
              </div>
              <div class="input-group-visualizar-post">
                <input type="text" placeholder="Data de Criação" form="dados-user" value="<?=$post->created_at?>" id="data-criacao-visualizar-post" readonly/>
              </div>
              <div class="button-fechar-visualizar-post">
                <button class="fechar-visualizar-post" onclick="fecharModal('modalVisualizarPost-<?= $post->id ?>')" form="dados-user" type="button">Fechar</button>
              </div>
            </form>
           </div>
        </div>
      </div>
    </div>
</body>
<script src="/public/js/modais.js"></script>
</html>