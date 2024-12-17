<?php
  if(!isset($_SESSION['user'])){
    header('Location: /login');
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/fonts.css">
  <link rel="stylesheet" href="/public/css/user-list.css">
  <title>CartoonVerse</title>
</head>
<body>
    <div class="container">
    <div id="header">

    <?php require __DIR__ . '/sidebar.view.php'; ?>

    <!-- Titulo -->
    <h1>LISTA DE USUARIOS</h1>
      <button id="usuario" onclick="abrirModal('modalCriar')">
        <p class="criar">Novo</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
        </svg>
      </button>
    </div>

  <div id="main">
     <!-- Tabela -->
     <p class='error'>
       <?php
          if(isset($_SESSION['erro-email'])) {
              echo "<script>
                      abrirModal('modalCriar');
                      mostrarErroModal('modalCriar', 'Erro! " . $_SESSION['erro-email'] . "');
                    </script>";
          }
          unset($_SESSION['erro-email']);
       ?>
     </p>
     <table>
      <tr>
        <th class="head id"><p>ID</p></th>
        <th class="head nome"><p>NOME</p></th>
        <th class="head email"><p>EMAIL</p></th>
        <th class="head acoes"><p>AÇÕES</p></th>
      </tr>
      <?php foreach($users as $user): ?>
        <tr>
        <td class="id"><p><?= $user->id ?></p></td>
        <td class="nome"><p><?= $user->name ?></p></td>
        <td class="email">
            <p><?= $user->email ?></p>
        </td>
        <td class="acoes">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" onclick="abrirModal('modalVisualizar-<?= $user->id ?>')">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16" onclick="abrirModal('modalEditar-<?= $user->id ?>')">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" onclick="abrirModal('modalExcluir-<?= $user->id ?>')">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
            </svg>
        </td>
    </tr>

      <!-- Modal de Criar -->
      <?php require __DIR__ . '/user-modals/create-user.view.php' ?>

      <!-- Modal de Visualizar -->
      <?php require(__DIR__ . '/user-modals/view-user.view.php') ?>

      <!-- Modal de Editar -->
      <?php require(__DIR__ . '/user-modals/edit-user.view.php') ?>

      <!-- Modal de Excluir -->
      <?php require(__DIR__ . '/user-modals/delete-user.view.php') ?>
      <?php endforeach; ?>
     </table>

     <!-- Paginação -->
    <?php require __DIR__ . '/../components/paginacao.php' ?>

  </div>
  </div>
</body>
<script src="/public/js/modais.js"></script>
</html>