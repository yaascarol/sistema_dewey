<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/editar_clientes.css">
</head>

<body>

    <nav>
        <h3>ADMINISTRADOR - (NOME)</h3>
        <h1>EDITAR LEITOR</h1>
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
            <button class="search"><input type="search" placeholder="Consultar..."> <img
                    src="imagens/search-icon-png-21.png"></button>
            <button class="user"><a href="login.php"><img src="imagens/logout-icon-2048x2048-libuexip.png">
                    <h6>SAIR
                </a>
                <h6>
            </button>
        </div>
    </nav>
    <div class="container">
        <form class="dados">
            <div id="dados-esquerda">
                <div id="capa"></div>
            </div>
            <div id="dados-direita">
                <div class="input-wrapper">
                    <input type="text" placeholder="Nome:" class="nome">
                </div>
                <div class="input-wrapper">
                    <input type="tel" placeholder="Telefone:" class="telefone">
                </div>
                <div class="input-wrapper">
                    <input type="email" placeholder="E-mail:" class="email">
                </div>
                <div class="input-wrapper">
                    <input type="text" placeholder="Endereço:" class="endereco">
                </div>
                <ul class="sugestoes"></ul>
                <button id="editar_clientes">Editar</button>
            </div>
        </form>
    </div>
    </div>

    <script src="editleitor-script.js"></script>
</body>

</html>