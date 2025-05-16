<?php
require_once 'conexao.php';

if (!isset($_GET['id'])) {
    echo "ID do livro não especificado.";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM livros WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    echo "Livro não encontrado.";
    exit;
}

$livro = $resultado->fetch_assoc();
?>

<h2>Editar Livro</h2>
<form action="atualizar_livro.php" method="POST">
    <input type="hidden" name="id" value="<?= $livro['ID'] ?>">
    <label>Título: <input type="text" name="titulo" value="<?= $livro['titulo'] ?>" required></label><br>
    <label>Gênero: <input type="text" name="genero" value="<?= $livro['genero'] ?>" required></label><br>
    <label>Resumo: <textarea name="resumo"><?= $livro['resumo'] ?></textarea></label><br>
    <label>Estoque: <input type="number" name="estoque" value="<?= $livro['estoque'] ?>" min="0"></label><br>
    <button type="submit">Atualizar</button>
</form>