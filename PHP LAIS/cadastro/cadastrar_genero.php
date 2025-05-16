<?php
require_once 'conexao.php';

$categoria = $_POST['categoria'] ?? '';

$sql = "INSERT INTO Genero (Categoria_Livro) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $categoria);

if ($stmt->execute()) {
    echo "Gênero cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar gênero: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>