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
    <?php require('navbar.html'); ?>
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

    <section class="about-section">
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
              <div class="slide active">  
                  <img src="https://super.abril.com.br/wp-content/uploads/2018/07/566ee0ae82bee174ca0300dahomer-simpson1.jpeg?quality=70&strip=info&w=720&h=440&crop=1" alt="Imagem 1">  
              </div>  
              <div class="slide">  
                  <img src="https://prod-ripcut-delivery.disney-plus.net/v1/variant/disney/BB9A325FBD603DB140BE78B630ABB64D72030DD55928192851959DE28441AB75/scale?width=440&aspectRatio=1.78&format=webp" alt="Imagem 2">  
              </div>  
              <div class="slide"> 
                  <img src="https://recreio.com.br/media/_versions/legacy/2020/12/17/31-anos-de-simpsons-9-curiosidades-sobre-a-serie-de-sucesso-1226089_widexl.png" alt="Imagem 3">  
              </div>  
              <div class="slide">  
                  <img src="https://aventurasnahistoria.com.br/media/uploads/2024/03/simpsons-3.jpg" alt="Imagem 4">  
              </div>  
          </div>  
    <div class="carousel-indicators">
      <span class="indicator active" onclick="currentSlide(1)"></span>
      <span class="indicator" onclick="currentSlide(2)"></span>
      <span class="indicator" onclick="currentSlide(3)"></span>
      <span class="indicator" onclick="currentSlide(4)"></span>
    </div>
  </div>
  </section>


    <script src="/public/js/landing-page.js"></script>
    <?php require("footer.html"); ?>
  </body>
</html>
