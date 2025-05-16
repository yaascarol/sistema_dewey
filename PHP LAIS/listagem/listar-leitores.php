<?php
include 'conexao.php';

try {
    $sql = "SELECT * FROM Leitor";
    $stmt = $conexao->query($sql);
    $leitores = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($leitores as $leitor) {
        echo "<p>ID: {$leitor['ID']} | Nome: {$leitor['Nome']} | Email: {$leitor['Email']} | Contato: {$leitor['Contato']}</p>";
    }
} catch (PDOException $e) {
    echo "Erro ao listar leitores: " . $e->getMessage();
}
?>