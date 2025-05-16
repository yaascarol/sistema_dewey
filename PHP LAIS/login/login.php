<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $usuario_valido = 'admin';
    $senha_valida = '12345';

    if ($usuario === $usuario_valido && $senha === $senha_valida) {
        header('Location: index.html');
        exit();
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>