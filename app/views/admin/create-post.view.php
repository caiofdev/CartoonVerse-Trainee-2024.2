<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/css/create-post.css" />
    <title>CartoonVerse</title>
  </head>
  <body>
    <div id="modalCriarPost" class="modal-create-post modal">
      <div class="general-container-create-post">
        <a
          class="close-create-post"
          onclick="fecharModal('modalCriarPost')"
          >&times;</a
        >
        <h1>CRIAR POST</h1>
        <div class="modal-body-create-post">
          <div class="modal-form-create-post">
            <form id="formulario" action="create-post" method="post" enctype="multipart/form-data" class="modal-form">
              <!-- <label for="titulo">Título</label> -->
              <div class="input-group-create-post" id="Título">
                <input
                    type="text"
                    class="input-titulo-create-post"
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
              <!-- <label for="input-image" class="label-imagem-create-post image" id="image" tabindex="0"
              >
              </label
              > -->
              <div class="input-group-create-post">
                <input
                  type="file"
                  class="input-image-create-post input-image"
                  id="input-image"
                  name="image"
                  required
                />
              </div>
              <!-- <label for="autor">Autor</label> -->
              <div class="input-group-create-post">
                  <input
                    type="text"
                    id="autor"
                    class="input-author-create-post"
                    name="author"
                    value="<?= $author ?>"
                    
                    placeholder="Autor" readonly
                  />
              </div>
              <!-- <label id="label-data-criacao" for="data-criacao"
                >Data de criação</label
              > -->
              <div class="input-group-create-post">
                <input type="text" id="data-criacao-create-post" name="created_at" value="<?= date('Y-m-d')?>" readonly />
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
