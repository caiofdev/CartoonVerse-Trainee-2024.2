<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/css/create-post.css" />
    <title>CartoonVerse</title>
  </head>
  <body>
    <div id="modalCriarPost" class="modal-create-post">
      <div class="general-container-create-post">
        <a
          class="close-create-post"
          onclick="fecharModal('modalCriarPost')"
          >&times;</a
        >
        <div class="modal-body-create-post">
          <div class="modal-form">
            <form id="formulario" action="create-post" method="post" class="modal-form">
              <!-- <label for="titulo">Título</label> -->
              <div class="input-group-create-post" id="Título">
                <input
                    type="text"
                    id="titulo"
                    name="title"
                    required
                    placeholder="Título"
                  />
              </div>
              <!-- <label for="conteudo">Conteúdo do Post</label> -->
              <div class="input-group-create-post">
                  <textarea
                    id="conteudo"
                    name="content"
                    rows="5"
                    required
                    placeholder="Conteúdo"
                  ></textarea>
              </div>
              <label for="input-image" class="label-imagem-create-post" id="image" tabindex="0"
              >
              <img src="<?= $post->image?>" alt="Imagem de <?= $post->title?>">
              </label
              >
              <input
                type="file"
                class="input-image-create-post"
                id="input-image"
                name="image"
                accept=".jpg, .jpeg, .png"
              />
              <!-- <label for="autor">Autor</label> -->
              <div class="input-group-create-post">
                  <input
                    type="text"
                    id="autor"
                    name="author"
                    value="<?php echo $_SESSION['id']; ?>"
                    required
                    placeholder="Autor" readonly
                  />
              </div>
              <!-- <label id="label-data-criacao" for="data-criacao"
                >Data de criação</label
              > -->
              <div class="input-group-create-post">
                <input type="date" id="data-criacao" name="created_at" value="<?php echo date('Y-m-d'); ?>" readonly required />
              </div>
              <div class="botoes-create-post">
                <button type="button" class="fechar-create-post" onclick="fecharModal('modalCriarPost')">Cancelar</button>
                <button type="submit" class="criar-create-post">Criar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="/public/js/modais.js"></script>
</html>
