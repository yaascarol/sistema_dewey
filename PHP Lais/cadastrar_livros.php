<?php
require_once ('conexao.php');

if(isset($_POST['submit'])){
    $Titulo = $_POST['Titulo'];
    $Resumo = $_POST['Resumo'];
    $Genero = $_POST['Genero'];
    $Estoque = $_POST['Estoque'];

    $resultado = $conexao->query ("INSERT INTO Livros(Titulo, Resumo, Genero, Estoque) VALUES ('$Titulo', '$Resumo', '$Genero', '$Estoque')");

}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/cadastrar_livro.css">
</head>
<body>
    <nav>
        <h3>ADMINISTRADOR - (NOME)</h3>
        <h1>CADASTRAR LIVRO</h1>
        <div class="menu">
            <ul>
                    <li class="menu-icon"><img src="imagens/332-3321096_mobile-menu-brown-menu-icon-png.png" alt="">
                        <ul>
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
        <form class="dados" action="cadastrar_livros.php" method="POST">
            <div id="dados-esquerda">
                <img src="" alt="" id="capa">
                <input type="number" name="Estoque" placeholder="Estoque:" class="estoque-livro" required>
            </div>
            <div id="dados-direita">
                <input type="text" name="Titulo" placeholder="Título do Livro:" required class="titulo">
                <input type="text" name="Genero" placeholder="Gênero do Livro:" class="genero">
                <textarea class="resumo" name="Resumo" placeholder="Resumo:"></textarea>
                <button type="submit" name="submit">Cadastrar</button>
            </div>
        </form>
    </div>
    </div>

</body>
</html>