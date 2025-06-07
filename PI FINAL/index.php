<?php
session_start();

$nome_administrador = "(NOME)";

if (isset($_SESSION['admin_nome']) && !empty($_SESSION['admin_nome'])) {
    $nome_administrador = $_SESSION['admin_nome'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Início</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
    <div class="container">
        <div ID="adm">
            <h3>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador)); ?></h3>
        </div>
        <div class="menu">
            <ul>
                <li class="menu-icon"><img src="imagens/332-3321096_mobile-menu-brown-menu-icon-png - Copia.png" alt="">
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
            <nav>
                <button class="search"><input type="search" placeholder="Consultar..."> <img src="imagens/search-icon-png-21.png"></button>
            </nav>
            <button class="user"><a href="login.php"><img src="imagens/logout-icon-2048x2048-libuexip.png"> <h6>SAIR</h6></a></button>
        </div>
        <div class="listagem">
            <div class="livros">
                <h4>LIVROS</h4>
                <p>X CADASTRADOS</p>
            </div>
            <div class="generos">
                <h4>GÊNEROS</h4>
                <p>X CADASTRADOS</p>
            </div>
            <div class="leitores">
                <h4>LEITORES</h4>
                <p>X CADASTRADOS</p>
            </div>
        </div>
    </div>
    <div class="circulo1"></div>
    <div class="circulo2"></div>

</body>
</html>