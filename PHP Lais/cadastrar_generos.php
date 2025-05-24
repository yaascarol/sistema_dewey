<?php 
include("conexao.php");

    if(isset($_POST)){
        $genero = $_POST['genero'];

        $sql_query = "INSERT INTO tblgenero (genero) VALUES ('$genero')";

        $stmt = $pdo->prepare($sql_query);
        $stmt->execute();

        echo "Genero cadastrado";
        header("Location: index.php")
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav-bar.css">
    <link rel="stylesheet" href="cadastrar-genero.css">
</head>
<body>

    <nav>
        <h3>ADMINISTRADOR - (NOME)</h3>
        <h1>CADASTRAR GÊNERO</h1>
        <div class="menu">
            <ul>
                    <li class="menu-icon"><img src="../imagens/332-3321096_mobile-menu-brown-menu-icon-png.png" alt="">
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
                <button class="search"><input type="search" placeholder="Consultar..."> <img src="../imagens/search-icon-png-21.png"></button>
                <button class="user"><a href="login.html"><img src="../imagens/logout-icon-2048x2048-libuexip.png"><h6>SAIR</a><h6></button>
        </div>
    </nav>

    <div class="container">
        <form class="dados" action="cadastrar_genero.php" method="post">
            <div id="dados-esquerda">
                <div id="capa"></div>
            </div>
            <div id="dados-direita">
                <input type="text" name="genero" placeholder="Gênero:" class="genero">
                <button><a href="index.html">Cadastrar</a></button>
            </div>
        </form>
    </div>
    </div>

</body>
</html>