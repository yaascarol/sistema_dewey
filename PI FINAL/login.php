<?php
session_start();
require_once ('conexao.php');

if(isset($_POST['email']) && isset($_POST['senha'])) {
    if(empty($_POST['email'])) {
        echo "Preencha seu e-mail!";
    } elseif(empty($_POST['senha'])) {
        echo "Preencha sua senha!";
    } else {
        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['senha']);

        $sql = "SELECT id, nome, email FROM administradores WHERE email = '$email' AND senha = '$senha'";
        
        $sql_query = $conexao->query($sql);

        if ($sql_query === false) {
            echo "Erro na execução do SQL: " . $conexao->error;
        } elseif ($sql_query->num_rows == 1) {
            $admin_data = $sql_query->fetch_assoc();

            $_SESSION['admin_id'] = $admin_data['id'];
            $_SESSION['admin_nome'] = $admin_data['nome'];

            header("Location: index.php");
            exit;
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/login.css">
</head>

<body>
    <div class="container">
        <main class="conteudo">
            <div class="left">
                <img src="imagens/logo2.png" alt="">
                <p>Seja bem-vindo ao sistema Dewey!</p>
            </div>
            <form action="login.php" method="POST">
                <input type="text" name="email" placeholder="Email:" required>
                <br>
                <input type="password" name="senha" placeholder="Senha:" required>
                <br>
                <button type="submit">Entrar</button>
            </form>
        </main>
    </div>
    <div class="circulo1"></div>
    <div class="circulo2"></div>
    <div class="circulo3"></div>
    <div class="circulo4"></div>

    <script>
    </script>
</body>

</html>