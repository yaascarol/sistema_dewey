<?php
session_start();
include('conexao.php');

$sql = "SELECT * FROM administradores ORDER BY id DESC";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Administradores</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/listar_adm.css">
</head>

<body>

    <nav>
        <h3>SISTEMA DEWEY</h3>
        <h1>LISTA DE ADMINISTRADORES</h1>
        <div class="menu">
            <button class="home"><a href="index.php"><img src="imagens/voltar.png">
                    <h6>HOME</h6>
                </a></button>
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
            <button class="user">
                <a href="login.php">
                    <img src="imagens/logout-icon-2048x2048-libuexip.png">
                    <h6>SAIR</h6>
                </a>
            </button>
        </div>
    </nav>

    <div class="container">
        <div class="content">
            <aside class="filter-menu">
                <h3>Filtros</h3>
                <div class="filter-group">
                    <label><input type="checkbox" name="nome" value="todos"> Todos</label>
                    <label><input type="checkbox" name="nome" value="a-f"> A-F</label>
                    <label><input type="checkbox" name="nome" value="g-l"> G-L</label>
                    <label><input type="checkbox" name="nome" value="m-r"> M-R</label>
                    <label><input type="checkbox" name="nome" value="s-z"> S-Z</label>
                </div>
                <button onclick="cleanFilters()">Limpar</button>
            </aside>

            <div class="listagemDireita">
                <table class="tableProdutos">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Senha</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($user_data = mysqli_fetch_assoc($resultado)){
                                echo "<tr>";
                                echo "<td>".$user_data['nome']."</td>";
                                echo "<td>".$user_data['email']."</td>";
                                echo "<td>".$user_data['senha']."</td>";
                                echo "<td> 
                                <a class='btnEditar' href='editar_adm.php?id=$user_data[id]'>Editar</a>
                                <a class='btnExcluir' href='excluir_adm.php?id=$user_data[id]'>Excluir</a>
                                </td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pagina">
            <button>1</button>
            <button>2</button>
            <button>3</button>
        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>