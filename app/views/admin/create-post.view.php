<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/css/create-post.css" />
    <title>CartoonVerse</title>
  </head>
  <body>
    <div class="general-container">
      <form id="formulario" action="create-post" method="post">
        <a
          class="close"
          onclick="fecharModal('modalCriar')"
          href="post-list.html"
          >&times;</a
        >
        <!-- <label for="titulo">Título</label> -->
        <input
          type="text"
          id="titulo"
          name="title"
          required
          placeholder="Título"
        />
        <!-- <label for="conteudo">Conteúdo do Post</label> -->
        <textarea
          id="conteudo"
          name="content"
          rows="5"
          required
          placeholder="Conteúdo"
        ></textarea>
        <label for="input-image" class="label-imagem" id="image" tabindex="0"
          >Imagem</label
        >
        <input
          type="file"
          class="input-image"
          id="input-image"
          name="image"
          required
          accept=".jpg, .jpeg, .png"
        />
        <!-- <label for="autor">Autor</label> -->
        <input
          type="text"
          id="autor"
          name="author"
          required
          placeholder="Autor" readonly
        />
        <!-- <label id="label-data-criacao" for="data-criacao"
          >Data de criação</label
        > -->
        <input type="date" id="data-criacao" name="created_at" readonly required />
        <div class="botoes">
          <a href="post-list.html">
            <div type="submit">Cancelar</div>
          </a>
          <button type="submit">Criar</button>
        </div>
      </form>
    </div>
  </body>
  <script src="/public/js/create-post.js"></script>
</html>
