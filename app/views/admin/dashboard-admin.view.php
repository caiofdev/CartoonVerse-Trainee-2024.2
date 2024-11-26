<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header('Location: /login');
  }

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="/public/css/dashboard-admin.css" />
    <link rel="stylesheet" href="/public/css/fonts.css" />
  </head>
  <body>
    <!-- Hero Section / Título da Página -->
    <div class="hero-dashboard">
      <h1>Dashboard Admin</h1>
      <p>Gerencie publicações e usuários diretamente nesta página.</p>
    </div>

    <!-- Links Administrativos -->
    <div class="admin-links">
      <a href="publicacoes-admin.html" class="admin-link">
        <h2>Publicações</h2>
        <p>Acessar publicações</p>
      </a>
      <a href="usuarios-admin.html" class="admin-link">
        <h2>Usuários</h2>
        <p>Gerenciar usuários</p>
      </a>
      <form action="/logout" method="POST">
        <button type="submit" class="admin-link logout">
          <h2>Logout</h2>
          <p>Encerrar sessão</p>
        </button>
      </form>
    </div>
  </body>
</html>
