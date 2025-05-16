<?php
include 'conexao.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $categoria = $_POST['categoria'];

    if (!empty($id) && !empty($categoria)) {
        try {
            $sql = "UPDATE Genero SET Categoria_Livro = :categoria WHERE ID = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            echo "Gênero atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar o gênero: " . $e->getMessage();
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    echo "Acesso inválido.";
}
?>