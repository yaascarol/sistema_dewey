<?php
include_once ('conexao.php');

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM administradores WHERE id=$id";
    $resultado = $conexao->query($sqlSelect);
    
    if($resultado->num_rows > 0){
    $sqlDelete="DELETE FROM administradores WHERE id=$id";
    $resultado = $conexao->query($sqlDelete);
    header('Location: listar_adm.php'); }
}
?>
