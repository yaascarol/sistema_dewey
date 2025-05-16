<?php
require_once 'conexao.php';

$titulo = $_POST['titulo'];
$genero = $_POST['genero'];
$resumo = $_POST['resumo'];
$estoque = $_POST['estoque'];

$sql = "INSERT INTO livros (titulo, genero, resumo, estoque) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $titulo, $genero, $resumo, $estoque);

if ($stmt->execute()) {
    echo "Livro cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>