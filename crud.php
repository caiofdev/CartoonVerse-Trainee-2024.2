<?php
require 'db.php';

//READ
function getAllUsers() {
    // Conectar ao banco de dados
    $pdo = getDatabaseConnection();

    // Escrever a query para buscar todos os usuários
    $sql = "SELECT * FROM users";

    // Preparar e executar a query
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Buscar todos os resultados como um array associativo
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

// Exemplo de uso (pra aplicar no html)
$usuarios = getAllUsers();
foreach ($usuarios as $usuario) {
    echo "ID: {$usuario['id']}\n";
    echo "Nome: {$usuario['name']}\n";
    echo "Email: {$usuario['email']}\n";
    echo "Senha: {$usuario['password']}\n\n";
}

//Função para obter um usuário específico pelo ID
function getUser($id) {

    $pdo = getDatabaseConnection();
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); //Substitui o ":id" acima pelo id fornecido
        $stmt->execute();

        // Retorna o usuário como array ou null se não encontrado
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar o usuário: " . $e->getMessage();
        return null;
    }
}

//Exemplo de uso
$usuario = getUser(1);
echo "ID: {$usuario['id']}\n";
echo "Nome: {$usuario['name']}\n";
echo "Email: {$usuario['email']}\n";
echo "Senha: {$usuario['password']}\n\n";

//DELETE
function deleteUser(){
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id = $_POST['id'];
        try {
            // Preparar a consulta SQL para excluir o registro
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            echo "Registro excluído com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao excluir o registro: " . $e->getMessage();
        }
    } else {
        echo "ID inválido ou não fornecido.";
    }
}

