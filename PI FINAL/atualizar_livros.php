<?php
include_once('conexao.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $genero_id = $_POST['genero_id'];
    $resumo = $_POST['resumo'];
    $estoque = $_POST['estoque'];

    $sqlUpdate = "UPDATE livros SET titulo='$titulo', resumo='$resumo', genero_id='$genero_id', estoque='$estoque'
    WHERE id='$id'";
    
    $resultado = $conexao->query($sqlUpdate);
}
header('Location: listar_livros.php');
?>