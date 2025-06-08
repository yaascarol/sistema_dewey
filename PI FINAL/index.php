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

    <nav>
        <h3>SISTEMA DEWEY</h3>
        <h1>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador)); ?></h1>
          <div class="menu">
            <button class="home"><a href="index.php"><img src="imagens/voltar.png"><h6>HOME</a><h6></button>
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
                      <li class="menu-dropdown">Leitores
                          <ul class="menu-dropdown-right">
                              <li><a href="cadastrar_clientes.php">Cadastrar</a></li>
                              <li><a href="listar_clientes.php">Listar</a></li>
                          </ul>
                      </li>
                  </ul>
              </li>
          </ul>
          <button class="search"><input type="search" placeholder="Consultar..."> <img src="imagens/search-icon-png-21.png"></button>
          <button class="user"><a href="login.php"><img src="imagens/logout-icon-2048x2048-libuexip.png"><h6>SAIR</a><h6></button>
    </div>
    </nav>

<div class="container">
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
