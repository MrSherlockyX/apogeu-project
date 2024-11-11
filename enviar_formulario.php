<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";  // Usuário padrão do XAMPP
$password = "";      // Senha padrão vazia
$dbname = "apogeu_lanches";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    // Inserir os dados na tabela 'contatos'
    $sql = "INSERT INTO contatos (nome, email, assunto, telefone, mensagem) VALUES (?, ?, ?, ?, ?)";

    // Preparar e executar a declaração
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nome, $email, $assunto, $telefone, $mensagem);

    if ($stmt->execute()) {
        echo "Sua mensagem foi enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem. Por favor, tente novamente.";
    }

    // Fechar a declaração e a conexão
    $stmt->close();
}
$conn->close();
?>
