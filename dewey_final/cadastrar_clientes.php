<?php
session_start();
require_once('conexao.php');

$nome_administrador = isset($_SESSION['nome_administrador']) ? $_SESSION['nome_administrador'] : '';

$mensagem = '';

if (isset($_POST['submit'])) {
    // Coleta e validação simples dos dados
    $nome = $_POST['nome'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $email = $_POST['email'] ?? '';
    $logradouro = $_POST['logradouro'] ?? '';
    $numero = $_POST['numero'] ?? '';
    $complemento = $_POST['complemento'] ?? '';
    $cidade = $_POST['municipio'] ?? '';
    $uf = $_POST['uf'] ?? '';
    $cep = $_POST['cep'] ?? '';

    // Preparando statement para evitar SQL injection
    $stmt = $conexao->prepare("INSERT INTO clientes (nome, telefone, email, logradouro, numero, complemento, municipio, uf, cep) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sssssssss", $nome, $telefone, $email, $logradouro, $numero, $complemento, $cidade, $uf, $cep);
        if ($stmt->execute()) {
            $mensagem = "Cliente cadastrado com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar cliente: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $mensagem = "Erro na preparação da query: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastrar - Clientes</title>
    <link rel="stylesheet" href="CSS/nav_bar.css" />
    <link rel="stylesheet" href="CSS/cadastrar_clientes.css" />
</head>

<body>
    <nav>
        <?php if ($nome_administrador): ?>
            <h3>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador)); ?></h3>
        <?php endif; ?>
        <h1>CADASTRAR CLIENTES</h1>
        <div class="menu">
            <button class="home">
                <a href="index.php"><img src="imagens/voltar.png" alt="Voltar" /><h6>HOME</h6></a>
            </button>
            <ul>
                <li class="menu-icon"><img src="imagens/332-3321096_mobile-menu-brown-menu-icon-png.png" alt="" />
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
            <button class="search">
                <input type="search" placeholder="Consultar..." />
                <img src="imagens/search-icon-png-21.png" alt="Buscar" />
            </button>
            <button class="user">
                <a href="login.php"><img src="imagens/logout-icon-2048x2048-libuexip.png" alt="Sair" /><h6>SAIR</h6></a>
            </button>
        </div>
    </nav>

    <div class="container">
        <?php if ($mensagem): ?>
            <p style="color: green; font-weight: bold; margin-bottom: 15px;"><?php echo htmlspecialchars($mensagem); ?></p>
        <?php endif; ?>

        <form class="dados" action="cadastrar_clientes.php" method="post">
            <div id="dados-esquerda">
                <input type="text" name="nome" placeholder="Nome:" class="nome" required />
                <input type="tel" name="telefone" placeholder="Telefone:" class="telefone" required />
                <input type="email" name="email" placeholder="E-mail:" class="email" required />
            </div>
            <div id="dados-direita">
                <div class="endereco1">
                    <input type="text" name="logradouro" placeholder="Logradouro:" class="logradouro" required />
                    <input type="text" name="numero" placeholder="Número:" class="numero" required />
                    <input type="text" name="complemento" placeholder="Complemento:" class="complemento" />
                </div>
                <div class="endereco2">
                    <input type="text" name="cidade" placeholder="Cidade:" class="cidade" required />
                    <input type="text" name="uf" placeholder="UF:" class="uf" maxlength="2" required />
                    <input type="text" name="cep" placeholder="CEP:" class="cep" required />
                </div>
                <button type="submit" name="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</body>

</html>
