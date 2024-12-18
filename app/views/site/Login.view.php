<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
      rel="stylesheet"
    />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CartoonVerse</title>
    <link rel="stylesheet" href="/public/css/login.css" />
    <link rel="stylesheet" href="/public/css/fonts.css" />
  </head>
  <body>
    <div class="container">
      <div class="login">
        <form action="/login" method="POST" id="formulario">
          <h1 id="titulo">LOGIN</h1>
          <div class="mensagem-erro">
            <p>
              <?php 
                if(isset($_SESSION['mensagem-erro']))
                  echo $_SESSION['mensagem-erro'];
                
                unset($_SESSION['mensagem-erro']);
              ?>
            </p>
          </div>
          <div class="input-container">
            <input placeholder="Email" type="email" name="email" id="email" required />
            <img
              src="/public/assets/Icons/icons8-email-96.png"
              alt="Email"
              width="20"
            />
          </div>
          <div class="input-container">
            <input placeholder="Senha" type="password" name="senha" id="senha" required />
            <img
              src="/public/assets/Icons/icons8-lock-96.png"
              alt="Email"
              width="20"
            />
          </div>
          <button
            type="submit"
            class="submit-button"
            onmouseenter="trocarShadow()" onmouseleave="trocarShadow()"
          >
            Login
          </button>
          <button
            type="button"
            class="voltar-button"
            onclick="window.location.href='/'"
          >
            Voltar
          </button>
        </form>
      </div>
      <img
        src="/public/assets/logo/Logo 2 sem fundo.png"
        alt="Logo"
        class="logo"
        role="button"
        tabindex="0"
        onclick="Abrirlosteps()"
      />
    </div>
  </body>
  <script src="/public/js/text-shadow.js"></script>
  <script src="/public/js/LostEps.js"></script>
</html>
