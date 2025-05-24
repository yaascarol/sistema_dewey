<?php
require_once 'conexao.php';

$id = $_POST['id'] ?? '';
$titulo = $_POST['titulo'] ?? '';
$genero = $_POST['genero'] ?? '';
$resumo = $_POST['resumo'] ?? '';
$estoque = $_POST['estoque'] ?? '';

$sql = "UPDATE livros SET titulo = ?, genero = ?, resumo = ?, estoque = ? WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssii", $titulo, $genero, $resumo, $estoque, $id);

if ($stmt->execute()) {
    echo "Livro atualizado com sucesso!";
} else {
    echo "Erro ao atualizar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>