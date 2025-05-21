

<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Início</title>
    <link rel="stylesheet" href="nav-bar.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div ID="adm">
            <h3>ADMINISTRADOR - (NOME)</h3>
        </div>
        <div class="menu">
            <ul>
                    <li class="menu-icon"><img src="imagens/332-3321096_mobile-menu-brown-menu-icon-png.png" alt="">
                        <ul>
                            <li class="menu-dropdown">Livros
                            <ul class="menu-dropdown-right">
                                <li><a href="../cadastro/cadastrar-livro.html">Cadastrar</a></li>
                                <li><a href="#">Editar</a></li>
                                <li><a href="#">Listar</a></li>
                            </ul>
                            </li>
                            <li class="menu-dropdown">Gêneros
                                <ul class="menu-dropdown-right">
                                    <li><a href="../cadastro/cadastrar-genero.html">Cadastrar</a></li>
                                    <li><a href="#">Editar</a></li>
                                    <li><a href="#">Listar</a></li>
                                </ul>
                            </li>
                            <li class="menu-dropdown">Leitores
                                <ul class="menu-dropdown-right">
                                    <li><a href="../cadastro/cadastrar-leitor.html">Cadastrar</a></li>
                                    <li><a href="#">Editar</a></li>
                                    <li><a href="#">Listar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            <nav>
                <button class="search"><input type="search" placeholder="Consultar..."> <img src="imagens/search-icon-png-21.png"></button>
            </nav>
            <button class="user"><a href="login.html"><img src="imagens/logout-icon-2048x2048-libuexip.png"> <h6>SAIR</a><h6></button>
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