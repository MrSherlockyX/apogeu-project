<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";  
$password = "";     
$dbname = "apogeu_lanches";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $telefone = $_POST['telefone'];
    $pedidos = $_POST['pedidos'];


    $sql = "INSERT INTO pedidos (nome, email, assunto, telefone, pedidos) VALUES (?, ?, ?, ?, ?)";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nome, $email, $assunto, $telefone, $pedidos);

    if ($stmt->execute()) {
        echo "Sua pedido foi enviada com sucesso!";
    } else {
        echo "Erro ao enviar a pedidos. Por favor, tente novamente.";
    }


    $stmt->close();
}
$conn->close();
?>
