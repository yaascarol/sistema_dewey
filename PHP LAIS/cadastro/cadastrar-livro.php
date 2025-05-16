<?php
require_once 'conexao.php';

$sql = "SELECT * FROM Livros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($livro = $result->fetch_assoc()) {
        echo "ID: " . $livro["ID"] . "<br>";
        echo "Nome: " . $livro["Nome_Livro"] . "<br>";
        echo "Gênero: " . $livro["Genero"] . "<br><hr>";
    }
} else {
    echo "Nenhum livro encontrado.";
}

$conn->close();
?>