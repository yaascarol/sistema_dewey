<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$bdname = 'bd_dewey';

$conexao = new mysqli($host, $usuario, $senha, $bdname);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>