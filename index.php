<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento de Usuários</title>
</head>
<body>
    <h2>Criar Usuário</h2>
    <form action="crud.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="create">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="image">Imagem:</label>
        <input type="file" id="image" name="image" required><br><br>
        <input type="submit" value="Criar">
    </form>

    <h2>Buscar Usuário para Atualizar</h2>
    <form action="index.php" method="get">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required><br><br>
        <input type="submit" value="Buscar">
    </form>

    <?php
    if (isset($_GET['id'])) {
        require_once 'crud.php';

        $user = getUserById($_GET['id']);

        if ($user) {
            echo '<h2>Atualizar Usuário</h2>';
            echo '<form action="crud.php" method="post" enctype="multipart/form-data">';
            echo '<input type="hidden" name="action" value="update">';
            echo '<input type="hidden" name="id" value="' . $user['id'] . '">';
            echo '<label for="name">Nome:</label>';
            echo '<input type="text" id="name" name="name" value="' . $user['name'] . '"><br><br>';
            echo '<label for="email">Email:</label>';
            echo '<input type="email" id="email" name="email" value="' . $user['email'] . '"><br><br>';
            echo '<label for="password">Senha:</label>';
            echo '<input type="password" id="password" name="password" value="' . $user['password'] . '"><br><br>';
            echo '<label for="image">Imagem:</label>';
            echo '<input type="file" id="image" name="image"><br><br>';
            echo '<img src="' . $user['image'] . '" alt="Imagem de ' . $user['name'] . '" width="100"><br><br>';
            echo '<input type="submit" value="Atualizar">';
            echo '</form>';
        } else {
            echo 'Usuário não encontrado.';
        }
    }
    ?>

    <h2>Deletar Usuário</h2>
    <form action="crud.php" method="post">
        <input type="hidden" name="action" value="delete">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required><br><br>
        <input type="submit" value="Deletar">
    </form>

    <h2>Lista de Usuários</h2>
    <?php
    require 'crud.php';
    $usuarios = getAllUsers();
    foreach ($usuarios as $usuario) {
        echo "ID: {$usuario['id']}<br>";
        echo "Nome: {$usuario['name']}<br>";
        echo "Email: {$usuario['email']}<br>";
        echo "Imagem: <img src='{$usuario['image']}' alt='Imagem de {$usuario['name']}' width='100'><br><br>";
    }
    ?>
</body>
</html>