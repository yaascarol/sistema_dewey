<?php

include_once('conexao.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $genero_nome = $conexao->real_escape_string($_POST['generos']);

    $sqlUpdate = "UPDATE generos SET nome_genero='$genero_nome' WHERE id='$id'";
    
    $resultado = $conexao->query($sqlUpdate);

    if ($resultado === false) {
        die("Erro ao atualizar o gênero: " . $conexao->error);
    }
}

header('Location: listar_generos.php');
exit();
?>