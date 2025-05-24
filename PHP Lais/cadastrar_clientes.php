<?php
require_once ('conexao.php');

if(isset($_POST['submit'])){
    $Nome = $_POST['Nome'];
    $Telefone = $_POST['Telefone'];
    $Email = $_POST['Email'];
    $Endereco = $_POST['Endereco'];

    $resultado = $conexao->query ("INSERT INTO leitores(Nome, Telefone, Email, Endereco) VALUES ('$Nome', '$Telefone', '$Email', '$Endereco')"); 
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar - Clientes</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/cadastrar_leitor.css">
</head>
<body>
    <nav>
        <h3>ADMINISTRADOR - (NOME)</h3>
        <h1>CADASTRAR LEITOR</h1>
        <div class="menu">
            <button class="home"><a href="index.html"><img src="imagens/voltar.png"><h6>HOME</a><h6></button>
            <ul>
                <li class="menu-icon"><img src="imagens/332-3321096_mobile-menu-brown-menu-icon-png.png" alt="">
                    <ul>
                        <li class="menu-dropdown">Administrador
                            <ul class="menu-dropdown-right">
                                <li><a href="cadastrar-adm.html">Cadastrar</a></li>
                                <li><a href="editar-adm.html">Editar</a></li>
                                <li><a href="listar-adm.html">Listar</a></li>
                            </ul>
                        </li>
                        <li class="menu-dropdown">Livros
                        <ul class="menu-dropdown-right">
                            <li><a href="cadastrar-livro.html">Cadastrar</a></li>
                            <li><a href="editar-livro.html">Editar</a></li>
                            <li><a href="listar-livro.html">Listar</a></li>
                        </ul>
                        </li>
                        <li class="menu-dropdown">Gêneros
                            <ul class="menu-dropdown-right">
                                <li><a href="cadastrar-genero.html">Cadastrar</a></li>
                                <li><a href="editar-genero.html">Editar</a></li>
                                <li><a href="listar-genero.html">Listar</a></li>
                            </ul>
                        </li>
                        <li class="menu-dropdown">Leitores
                            <ul class="menu-dropdown-right">
                                <li><a href="cadastrar-leitor.html">Cadastrar</a></li>
                                <li><a href="editar-leitor.html">Editar</a></li>
                                <li><a href="listar-leitor.html">Listar</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
                <button class="search"><input type="search" placeholder="Consultar..."> <img src="imagens/search-icon-png-21.png"></button>
                <button class="user"><a href="login.html"><img src="imagens/logout-icon-2048x2048-libuexip.png"><h6>SAIR</a><h6></button>
        </div>
    </nav>
    <div class="container">
        <form class="dados" action="cadastrar_leitor.php" method="post">
            <div id="dados-esquerda">
                <div id="capa"></div>
            </div>
            <div id="dados-direita">
                <input type="text" name="Nome" placeholder="Nome:" class="nome">
                <input type="tel" name="Telefone" placeholder="Telefone:" class="telefone">
                <input type="email" name="Email" placeholder="E-mail:" class="email">
                <input type="text" name="Endereco" placeholder="Endereço:" class="endereco">
                <button type="submit" name="submit">Cadastrar</button>
            </div>
        </form>
    </div>
    </div>

</body>
</html>