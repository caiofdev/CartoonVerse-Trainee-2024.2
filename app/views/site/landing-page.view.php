<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CartoonVerse - Um Universo de Nostalgia</title>
    <link rel="stylesheet" href="/public/css/landing-page.css" />
    <link rel="stylesheet" href="/public/css/fonts.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  </head>
  <body>

  <?php require __DIR__ . '/navbar.view.php' ?>

    <!-- Main Section -->
    <section class="hero">
      <img
        src="/public/assets/img/imagemdefundoborrada.png"
        alt="fundo-hero"
        id="fundo-hero"
        usemap="#image-map"
      />
      <div class="logos">
        <img
          src="/public/assets/logo/logo2.png"
          alt="CartoonVerse"
          id="logo2"
        />
        <div id="logoslogan">
          <img
            src="/public/assets/logo/logo3.png"
            alt="CartoonVerse"
            id="logo3"
          />
          <h1>Um Universo de Nostalgia</h1>
        </div>
      </div>
    </section>

    <map name="image-map">
      <area
        target=""
        alt=""
        title=""
        href="https://www.youtube.com/watch?v=mErzkOQGoBI"
        coords="511,84,16"
        shape="circle"
      />
      <area
        target=""
        alt=""
        title=""
        href="https://www.youtube.com/watch?v=mErzkOQGoBI"
        coords="548,83,12"
        shape="circle"
      />
      <area
        target=""
        alt=""
        title=""
        href="https://www.youtube.com/watch?v=mErzkOQGoBI"
        coords="756,6,16"
        shape="circle"
      />
      <area
        target=""
        alt=""
        title=""
        href="https://www.youtube.com/watch?v=mErzkOQGoBI"
        coords="733,8,14"
        shape="circle"
      />
    </map>

    <section class="about-section" id='mvv'>
      <h2>Bem-vindo ao CartoonVerse!</h2>
      <p class="about-text">
        Nosso objetivo é trazer a nostalgia dos desenhos animados clássicos para
        todos os fãs.
      </p>
      <div class="about-cards">
        <div class="about-card">
          <h3>Missão</h3>
          <p>
            Preservar e celebrar a história dos desenhos animados, conectando
            fãs de todas as gerações.
          </p>
        </div>
        <div class="about-card">
          <h3>Visão</h3>
          <p>
            Ser a plataforma mais completa e amada para fãs de animação em todo
            o mundo.
          </p>
        </div>
        <div class="about-card">
          <h3>Valores</h3>
          <p>
            Paixão pela animação, autenticidade, respeito e inclusão para todos
            os fãs e criadores.
          </p>
        </div>
      </div>
    </section>

    <!-- Carrossel -->
    <section class="carrossel-section">
      <h1>POSTS DESTAQUE</h1>
      <div class="carousel">  
        <div class="carousel-slides">  
          <?php foreach($posts as $post): ?>
            <div class="slide active">  
              <img src="<?= $post->image ?>" alt="Imagem de <?=($post->author)?>">  
            </div> 
          <?php endforeach; ?>
        </div>  
        <div class="carousel-indicators">
          <?php foreach($posts as $index => $post): ?>
            <?php if ($index < 5): ?>
              <span class="indicator <?= $index === 0 ? 'active' : '' ?>" onclick="currentSlide(<?= $index + 1 ?>)"></span>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

  <?php require __DIR__ . '/footer.view.php' ?>

    <script src="/public/js/landing-page.js"></script>
  </body>
</html>
