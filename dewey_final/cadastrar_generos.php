<?php
session_start();
require_once ('conexao.php');

$nome_administrador = $_SESSION['nome_administrador'] ?? '';
$mensagem_erro = ''; // Variável para armazenar mensagens de erro

if(isset($_POST['submit'])){
    $genero_nome = $conexao->real_escape_string($_POST['generos']);

    // 1. Verificar se o gênero já existe
    $check_query = "SELECT id FROM generos WHERE categoria = '$genero_nome'";
    $check_result = $conexao->query($check_query);

    if ($check_result->num_rows > 0) {
        // Gênero já existe
        $mensagem_erro = "O gênero '" . htmlspecialchars($genero_nome) . "' já está cadastrado.";
    } else {
        // Gênero não existe, pode inserir
        $resultado = $conexao->query ("INSERT INTO generos(categoria) VALUES ('$genero_nome')");

        if ($resultado) {
            // Inserção bem-sucedida, você pode redirecionar ou exibir uma mensagem de sucesso
            header('Location: listar_generos.php'); // Redireciona para a lista de gêneros
            exit();
        } else {
            // Erro na inserção (fora a duplicidade, caso aconteça outro)
            $mensagem_erro = "Erro ao cadastrar o gênero: " . $conexao->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Gênero</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/cadastrar_generos.css"></head>
<body>

    <nav>
        <?php if (!empty($nome_administrador)): ?>
            <h3>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador)); ?></h3>
        <?php endif; ?>
        <h1>CADASTRAR GÊNEROS</h1>
          <div class="menu">
            <button class="home"><a href="index.php"><img src="imagens/voltar.png"><h6>HOME</h6></a></button>
            <ul>
              <li class="menu-icon"><img src="imagens/332-3321096_mobile-menu-brown-menu-icon-png.png" alt="">
                    <ul>
                        <li class="menu-dropdown">Administrador
                            <ul class="menu-dropdown-right">
                                <li><a href="cadastrar_adm.php">Cadastrar</a></li>
                                <li><a href="listar_adm.php">Listar</a></li>
                            </ul>
                        </li>
                        <li class="menu-dropdown">Livros
                        <ul class="menu-dropdown-right">
                            <li><a href="cadastrar_livros.php">Cadastrar</a></li>
                            <li><a href="listar_livros.php">Listar</a></li>
                        </ul>
                        </li>
                        <li class="menu-dropdown">Gêneros
                            <ul class="menu-dropdown-right">
                                <li><a href="cadastrar_generos.php">Cadastrar</a></li>
                                <li><a href="listar_generos.php">Listar</a></li>
                            </ul>
                        </li>
                        <li class="menu-dropdown">Clientes
                            <ul class="menu-dropdown-right">
                                <li><a href="cadastrar_clientes.php">Cadastrar</a></li>
                                <li><a href="listar_clientes.php">Listar</a></li>
                            </ul>
                        </li>
                    </ul>
              </li>
          </ul>
            <button class="search"><input type="search" placeholder="Consultar..."> <img src="imagens/search-icon-png-21.png"></button>
            <button class="user"><a href="login.php"><img src="imagens/logout-icon-2048x2048-libuexip.png"><h6>SAIR</h6></a></button>
        </div>
    </nav>


    <div class="container">
        <form class="dados" action="cadastrar_generos.php" method="post">
            <div id="dados-esquerda">
                <div id="capa"></div>
            </div>
            <div id="dados-direita">
                <input type="text" name="generos" class="generos" placeholder="Gênero:">
                <button type="submit" name="submit">Cadastrar</button>
                <?php if (!empty($mensagem_erro)): ?>
                    <p style="color: red; margin-top: 10px;"><?php echo $mensagem_erro; ?></p>
                <?php endif; ?>
            </div>
        </form>
    </div>

</body>
</html>