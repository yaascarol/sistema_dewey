<?php
session_start();
require_once('conexao.php');

$nome_administrador = isset($_SESSION['admin_nome']) && !empty($_SESSION['admin_nome']) ? $_SESSION['admin_nome'] : ''; // Deixa vazio para "Bem-vindo" sem nome

$qtd_livros = 0;
$qtd_generos = 0;
$qtd_clientes = 0;

$result_livros = $conexao->query("SELECT COUNT(*) as total FROM livros");
if ($result_livros && $row = $result_livros->fetch_assoc()) {
$qtd_livros = $row['total'];
}

$result_generos = $conexao->query("SELECT COUNT(*) as total FROM generos");
if ($result_generos && $row = $result_generos->fetch_assoc()) {
$qtd_generos = $row['total'];
}

$result_clientes = $conexao->query("SELECT COUNT(*) as total FROM clientes");
if ($result_clientes && $row = $result_clientes->fetch_assoc()) {
$qtd_clientes = $row['total'];
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

<nav>
<h3>SISTEMA DEWEY</h3>
<h1>Bem-vindo<?php echo (!empty($nome_administrador) ? ' - ' . htmlspecialchars(strtoupper($nome_administrador)) : ''); ?></h1>
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
<div class="listagem">
<div class="livros">
<h4>LIVROS</h4>
<p><?php echo $qtd_livros; ?> CADASTRADOS</p>
</div>
<div class="generos">
<h4>GÊNEROS</h4>
<p><?php echo $qtd_generos; ?> CADASTRADOS</p>
</div>
<div class="clientes">
<h4>CLIENTES</h4>
<p><?php echo $qtd_clientes; ?> CADASTRADOS</p>
</div>
</div>
</div>
<div class="circulo1"></div>
<div class="circulo2"></div>

</body>
</html>