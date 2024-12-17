<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/fonts.css" />
    <title>Sidebar</title>
</head>
<body>
    <nav id="sidebar">
        <button id="hamburguer"><i  class="fa-solid fa-bars"></i></button>
        <div id="sidebar-content">    
            <button class="open-btn" id="arrow">
                <i id="open-btn-icon" class="fa-solid fa-chevron-right"></i>
            </button>
            <ul id="side-items">
                <?php
                    $current_page = basename($_SERVER['REQUEST_URI']);
                ?>
                <li class="side-item <?php echo $current_page == 'dashboard' ? 'active' : ''; ?>">
                    <a href="/admin/dashboard">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="item-description">
                            Dashboard
                        </span>
                    </a>
                </li>
        
                <li class="side-item <?php echo $current_page == 'posts' ? 'active' : ''; ?>">
                    <a href="/admin/posts">
                        <i class="fa-solid fa-image"></i>
                        <span class="item-description">
                            Publicações
                        </span>
                    </a>
                </li>
        
                <li class="side-item <?php echo $current_page == 'users' ? 'active' : ''; ?>">
                    <a href="/admin/users">
                        <i class="fa-solid fa-user"></i>
                        <span class="item-description">
                            Usuários
                        </span>
                    </a>
                </li>
    
                <li class="side-item <?php echo $current_page == 'logout' ? 'active' : ''; ?>">
                    <a href="/logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="item-description">
                            Logout
                        </span>
                    </a>
                </li>
            </ul>
            <div id="user">
                <img src="<?=$_SESSION['user']->image; ?>" id="user-avatar" alt="Avatar">
                <p id="info-user">
                    <span class="item-description">
                        <?=$_SESSION['user']->name; ?>
                    </span>
                </p>
            </div>
        </div>
    </nav>
    <script src="/public/js/sidebar.js"></script>
</body>
</html>