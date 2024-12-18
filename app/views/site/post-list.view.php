<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/lista-de-postagens.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="/public/css/fonts.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,1
00..900;1,14..32,100..900&display=swap" rel="stylesheet">
<title>CartoonVerse</title>
</head>
<?php require("navbar.view.php"); ?>
<body>
    <div class="general-container">
        
        <div class="search-bar">
            <form id="searchForm" method="GET" action="search-post">
                <input id="search" type="text" name="title" placeholder="PESQUISA" >
                <button type="submit" id="searchButton">
                    <div id="lupa"></div>
                </button>
            </form>
        </div>
        <div class="posts-div">
            <ul id="list">
                <?php foreach($posts as $post):?>
                    <li>
                        <a href="post?id=<?= $post->id ?>">  
                            <div id="post">
                                <p id="titulo"><?= $post->title ?></p>
                                <p id="autor-data">
                                    <br><?= $post->author . ' • ' . $post->created_at ?>
                                </p>
                                <img src=<?= $post->image ?> alt="">
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php require __DIR__ . '/../components/paginacao.php' ?>
    </div>
    <script src="/public/js/post-list-pags.js"></script>
<?php require("footer.view.php"); ?>  
</body>
</html>
