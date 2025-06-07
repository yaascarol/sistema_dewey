<?php
include_once ('conexao.php');

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM clientes WHERE id=$id"; // Alterado para 'clientes'
    $resultado = $conexao->query($sqlSelect);
    
if($resultado->num_rows > 0){
{
    $sqlDelete="DELETE FROM clientes WHERE id=$id"; // Alterado para 'clientes'
    $resultado = $conexao->query($sqlDelete);
}
    }
    else{
        header('Location: listar_cliente.php'); // Alterado para 'listar_cliente.php'
        
    }
}
?>