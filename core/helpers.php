<?php

function viewAdmin($name, $data = [])
{
    extract($data);

    return require "app/views/admin/{$name}.view.php";
}

function viewModalUser($name, $data = [])
{
    extract($data);

    return require "app/views/site/admin/user-modals/{$name}.view.php";
}

function viewModalPost($name, $data = [])
{
    extract($data);

    return require "app/views/site/admin/post-modals/{$name}.view.php";
}

function viewSite($name, $data = [])
{
    extract($data);

    return require "app/views/site/{$name}.view.php";
}

function redirect($path)
{
    header("Location: /{$path}");
}

// Função para fazer o upload da imagem
function uploadImage($file, $email)
{
    if (!isset($file) || !isset($file['error']) || empty($file['tmp_name'])) {
        return '../../public/assets/img/profile/' . "chopp.jpg";
    }

    if ($file['error'] !== UPLOAD_ERR_OK) {
        switch ($file['error']) {
            case UPLOAD_ERR_INI_SIZE:
                die("O arquivo excede o tamanho máximo permitido pelo servidor.");
            case UPLOAD_ERR_FORM_SIZE:
                die("O arquivo excede o tamanho máximo permitido pelo formulário.");
            case UPLOAD_ERR_PARTIAL:
                die("O upload do arquivo foi feito parcialmente.");
            case UPLOAD_ERR_NO_FILE:
                die("Nenhum arquivo foi enviado.");
            case UPLOAD_ERR_NO_TMP_DIR:
                die("Pasta temporária ausente.");
            case UPLOAD_ERR_CANT_WRITE:
                die("Falha em escrever o arquivo em disco.");
            case UPLOAD_ERR_EXTENSION:
                die("Uma extensão do PHP interrompeu o upload do arquivo.");
            default:
                die("Erro desconhecido no upload do arquivo.");
        }
    }

    $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/public/assets/img/profile/';
    $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $fileName = pathinfo($file['name'], PATHINFO_FILENAME);

    // Se o ID do usuário for fornecido, inclua-o no nome do arquivo
    if ($email) {
        $fileName = "{$email}";
    }

    $targetFile = $targetDir . $fileName . '.' . $imageFileType;

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
        $targetFile = $targetDir . $fileName . '.' . $imageFileType;
    }

    if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
        die("Desculpe, houve um erro ao fazer o upload do seu arquivo.");
    }

    return '../../public/assets/img/profile/' . basename($targetFile);
}