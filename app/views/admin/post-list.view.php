<?php
  if(!isset($_SESSION['user'])){
    header('Location: /login');
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/css/fonts.css" />
    <link rel="stylesheet" href="/public/css/post-list.css" />

    <title>CartoonVerse</title>
  </head>
  <body>
    <div class="container">
      <div id="header">

      <?php require __DIR__ . '/sidebar.view.php' ?>
        <!-- Titulo -->
        <h1>LISTA DE POSTS</h1>
        <button id="novo" onclick="abrirModal('modalCriarPost')">
          Novo
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="1em"
            fill="currentColor"
            class="bi bi-plus-circle"
            viewBox="0 0 16 16"
          >
            <path
              d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
            />
            <path
              d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"
            />
          </svg>
        </button>
      </div>
      <div id="main">
        <!-- Tvz um contador de registros -->
        <!-- adicionar botão de criar usuários -->
        <!-- Tabela -->
        <table>
          <tr>
            <th class="id"><p>ID</p></th>
            <th class="titulo"><p>TITULO</p></th>
            <th class="autor"><p>AUTOR</p></th>
            <th class="data"><p>DATA</p></th>
            <th class="acoes"><p>AÇÕES</p></th>
          </tr>
          <tr>
            <?php foreach($posts as $post):?>
            <td class="id"><p><?= $post->id ?></p></td>
            <td class="titulo"><p><?= $post->title ?></p></td>
            <td class="autor">
              <!-- <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
          </svg> -->
              <p><?= $post->author ?></p>
            </td>
            <td class="data"><p><?= $post->created_at ?></p></td>
            <td class="acoes">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="1em"
                fill="currentColor"
                class="bi bi-list"
                viewBox="0 0 16 16"
                onclick="abrirModal('modalVisualizarPost-<?= $post->id ?>')"
              >
                <path
                  fill-rule="evenodd"
                  d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"
                />
              </svg>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="1em"
                  fill="currentColor"
                  class="bi bi-pencil"
                  viewBox="0 0 16 16"
                  onclick="abrirModal('modalEditarPost-<?= $post->id ?>')"
                  >
                  <path
                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"
                  />
                </svg>
                
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="1em"
                  fill="currentColor"
                  class="bi bi-trash"
                  viewBox="0 0 16 16"
                  onclick="abrirModal('modalDeletePost-<?= $post->id ?>')"
                >
                  <path
                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"
                  />
                  <path
                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"
                  />
                </svg>
            </td>
          </tr>


          
          <!-- Modal de Visualizar -->
          <?php require __DIR__ . '/visualizar-post.view.php' ?>
          <!-- Modal de Editar -->
          <?php require __DIR__ . '/editar-post.view.php' ?>
          <!-- Modal de Excluir -->
          <?php require __DIR__ . '/delete-post.view.php' ?>
          <?php endforeach; ?>
          <!-- Modal de Criar -->
          <?php require __DIR__ . '/create-post.view.php' ?>
        </table>
        
        <!-- Paginação -->
        <?php require __DIR__ . '/../components/paginacao.php' ?>
      </div>
    </div>
  </body>
  <script src="../../../public/js/modais.js"></script>
</html>
