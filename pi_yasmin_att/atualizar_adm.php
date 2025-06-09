<?php
include_once('conexao.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sqlUpdate = "UPDATE administradores SET nome='$nome', email='$email', senha='$senha' WHERE id='$id'";
    
    $resultado = $conexao->query($sqlUpdate);
}
header('Location: listar_adm.php');
?>