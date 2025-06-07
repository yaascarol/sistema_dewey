<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$dbname = 'db_dewey';

$conexao = new mysqli($host, $usuario, $senha, $dbname);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>