<?php

include_once('conexao.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $generos = $_POST['generos'];

    $sqlUpdate = "UPDATE generos SET generos='$generos' WHERE id='$id'";
    
    $resultado = $conexao->query($sqlUpdate);
}
header('Location: listar_generos.php');
?>