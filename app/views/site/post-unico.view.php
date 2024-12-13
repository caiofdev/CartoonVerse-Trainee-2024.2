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
<?php require("navbar.html"); ?>
<body>
    <div class ="principal">
        <div class="title">
            <h1>
                <?php $post['titulo']; ?>
            </h1>
        </div>
        <div class="conteudo">
            <div class="autor">
                <img src=<?= $author['image'] ?>  alt="Icone do perfil">
                <p nome-autor><?= $post->author?> -</p>
                <p class="data"><?=$post['created_at']?></p>
            </div>
            <div class="texto">
                <p>
                </p>
            </div>  
            <div class="imagem_principal">
                <img src="<?=$post->image?>" alt="Imagem da publicação">
            </div>
        </div> 
    </div>
<?php require("footer.html"); ?>  
</body>
</html>