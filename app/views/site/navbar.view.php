<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/navbar_style.css">
    <link rel="stylesheet" href="/public/css/fonts.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title>CartoonVerse</title>
</head>

<body>
    <header>
        <div class="off-screen-hamb-menu">
            <div id="quit-div" onclick="toggleMenu()"></div>
            <ul>
                <li>
                    <div id="sec-container">
                        <img src="/public/assets/Icons/Home2-light.png" alt="">
                        <div id="text-container">
                            <a href="">HOME</a>
                        </div>
                    </div>
                    <div id="span-container">
                        <span></span>
                    </div>  
                </li>
                <li>
                    <div id="sec-container">
                        <img src="/public/assets/Icons/Activity-feed-light.png" alt="">
                        <div id="text-container">
                            <a href="post-list">POSTS</a>
                        </div>
                    </div>
                    <div id="span-container">
                        <span></span>
                    </div>
                </li>
                <li>
                    <div id="sec-container">
                        <img src="/public/assets/Icons/user2-light.png" alt="Home">
                        <div id="text-container">
                            <a href="login">LOGIN</a>
                        </div>
                    </div>
                    <div id="span-container">
                        <span></span>
                    </div>
                </li>
            </ul>
        </div>

        <nav class="navbar">
            <!-- Desktop version -> media rule -->
            <div class="home-side-desktop">
                <a href="/">
                    <div id="home"></div>
                </a>
                <a href="post-list" id="posts">Posts</a>
            </div>
            

            <a class='logo-link' href="/">
                <div class="logo"></div>
            </a>
            <div class="hamb-menu" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <!-- Desktop version -> media rule -->
            <div class="right-side-desktop">
                <a href="/post-list">
                    <div id="search"></div>
                </a>
                <a href="login">
                    <div id="profile"></div>
                </a>
            </div>
        </nav>
    </header>
    <script src="/public/js/navbar.js"></script>
</body>
</html>