<?php
require_once 'conexao.php';

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$contato = $_POST['contato'] ?? '';

$sql = "INSERT INTO Leitor (Nome, Email, Contato) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $email, $contato);

if ($stmt->execute()) {
    echo "Leitor cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar leitor: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>