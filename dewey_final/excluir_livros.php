<?php
include_once ('conexao.php');

if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $sqlDeleteImagens = "DELETE FROM imagens WHERE livro_id = $id";
    $resultadoImagens = $conexao->query($sqlDeleteImagens);

    if ($resultadoImagens === false) {
        die("Erro ao excluir imagens do livro: " . $conexao->error);
    }

    $sqlDeleteLivro = "DELETE FROM livros WHERE id = $id";
    $resultadoLivro = $conexao->query($sqlDeleteLivro);
    
    if ($resultadoLivro === false) {
        die("Erro ao excluir o livro: " . $conexao->error);
    }

    header('Location: listar_livros.php');
    exit(); 
} else {
    header('Location: listar_livros.php');
    exit();
}
?>