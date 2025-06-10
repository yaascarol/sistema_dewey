<?php

include_once('conexao.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cep = $_POST['cep'];
    
    $sqlUpdate = "UPDATE clientes SET nome='$nome', telefone='$telefone', email='$email',logradouro='$logradouro', numero='$numero', complemento='$complemento', cidade='$cidade', uf='$uf', cep='$cep' 
    WHERE id='$id'"; 

    $resultado = $conexao->query($sqlUpdate);
    if ($resultado === false) {
        die("Erro ao atualizar o gênero: " . $conexao->error);
    }
}
header('Location: listar_clientes.php');
?>