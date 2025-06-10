<?php
include_once ('conexao.php');

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM clientes WHERE id=$id";
    $resultado = $conexao->query($sqlSelect);
    
    if($resultado->num_rows > 0){
    $sqlDelete="DELETE FROM clientes WHERE id=$id";
    $resultado = $conexao->query($sqlDelete);
    header('Location: listar_clientes.php');}
}
?>
