<?php

function view($name, $data = [])
{
    extract($data);

    return require "app/views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: /{$path}");
}

// Função para fazer o upload da imagem
function uploadImage($file, $userId = null)
{
    $targetDir = __DIR__ . '/public/assets/img/profile/';
    $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $fileName = pathinfo($file['name'], PATHINFO_FILENAME);

    // Se o ID do usuário for fornecido, inclua-o no nome do arquivo
    if ($userId) {
        $fileName .= "_user{$userId}";
    }

    $targetFile = $targetDir . $fileName . '.' . $imageFileType;

    // Verificar se o arquivo é uma imagem
    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        die("O arquivo não é uma imagem.");
    }

    // Verificar o tamanho do arquivo
    if ($file['size'] > 50000000) { // 50MB
        die("Desculpe, o arquivo é muito grande.");
    }

    // Permitir certos formatos de arquivo
    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedFormats)) {
        die("Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.");
    }

    // Trocar o nome da imagem se ela já existir
    while (file_exists($targetFile)) {
        $targetFile = $targetDir . $fileName . '_' . uniqid() . '.' . $imageFileType;
    }

    // Tentar fazer o upload do arquivo
    if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
        die("Desculpe, houve um erro ao fazer o upload do seu arquivo.");
    }

    return '/public/assets/img/profile/' . basename($targetFile);
}

// Função para verificar se um usuário tem posts
function userHasPosts($userId)
{
    $pdo = getDatabaseConnection();
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM posts WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    } catch (PDOException $e) {
        echo "Erro ao verificar os posts do usuário: " . $e->getMessage();
        return false;
    }
}

// Função para deletar os posts de um usuário
function deletePostsByUserId($userId)
{
    $pdo = getDatabaseConnection();
    try {
        $stmt = $pdo->prepare("DELETE FROM posts WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao deletar os posts do usuário: " . $e->getMessage();
    }
}