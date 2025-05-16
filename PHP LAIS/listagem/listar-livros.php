<?php
include 'conexao.php';

try {
    $sql = "SELECT * FROM Livros";
    $stmt = $conexao->query($sql);
    $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($livros as $livro) {
        echo "<p>ID: {$livro['ID']} | Título: {$livro['Nome_Livro']} | Gênero: {$livro['Genero']}</p>";
    }
} catch (PDOException $e) {
    echo "Erro ao listar livros: " . $e->getMessage();
}
?>