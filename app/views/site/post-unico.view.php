<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CartoonVerse</title>
    <link rel="stylesheet" href="/public/css/post-unico.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="/public/css/fonts.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,1
00..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>

    <body>
        <div class ="principal">
            <div class="title">
                <h1>
                    <?php $post['titulo']; ?>
                </h1>
            </div>
            <div class="conteudo">
                <div class="autor">
                    <img src="/public/assets/img/icone_pessoa.png" alt="Icone do perfil">
                    <p nome-autor><?= $post['author']?> - </p>
                    <p class="data"><?=$post['created_at']?></p>
                </div>
                <div class="texto">
                    <p>
                        <?php $post['content']; ?>
                    </p>
                </div>  
                <div class="imagem_principal">
                    <img src="/public/assets/img/gumball.jpg" alt="Imagem da publicação">
                </div>
            </div> 
        </div>  
    </body>
</html>