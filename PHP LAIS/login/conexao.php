<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$bdname = 'bd_wedey';

$conn = new mysqli($host, $usuario, $senha, $bdname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>