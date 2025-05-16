<?php
include 'conexao.php';

try {
    $sql = "SELECT * FROM Genero";
    $stmt = $conexao->query($sql);
    $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($generos as $genero) {
        echo "<p>ID: {$genero['ID']} | Categoria: {$genero['Categoria_Livro']}</p>";
    }
} catch (PDOException $e) {
    echo "Erro ao listar gêneros: " . $e->getMessage();
}
?>