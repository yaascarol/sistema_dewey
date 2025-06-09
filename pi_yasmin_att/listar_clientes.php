<?php
session_start();
include('conexao.php');

$nome_administrador = isset($_SESSION['nome_administrador']) ? $_SESSION['nome_administrador'] : '(NOME)';

$sql = "SELECT * FROM clientes ORDER BY id DESC";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Listagem de Clientes</title>
    <link rel="stylesheet" href="CSS/nav_bar.css" />
    <link rel="stylesheet" href="CSS/listar_clientes.css" />
</head>

<body>
    <nav>
        <h3>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador)); ?></h3>
        <h1>LISTA DE CLIENTES</h1>
        <div class="menu">
            <a class="home" href="index.php">
                <img src="imagens/voltar.png" alt="Voltar" />
                <h6>HOME</h6>
            </a>

            <ul>
                <li class="menu-icon">
                    <img src="imagens/332-3321096_mobile-menu-brown-menu-icon-png.png" alt="" />
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

            <div class="search">
                <input type="search" placeholder="Consultar..." />
                <img src="imagens/search-icon-png-21.png" alt="Buscar" />
            </div>

            <a class="user" href="login.php">
                <img src="imagens/logout-icon-2048x2048-libuexip.png" alt="Sair" />
                <h6>SAIR</h6>
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="content">
            <aside class="filter-menu">
                <h3>Filtros</h3>
                <div class="filter-group">
                    <label><input type="checkbox" name="nome" value="todos" /> Todos</label>
                    <label><input type="checkbox" name="nome" value="a-f" /> A-F</label>
                    <label><input type="checkbox" name="nome" value="g-l" /> G-L</label>
                    <label><input type="checkbox" name="nome" value="m-r" /> M-R</label>
                    <label><input type="checkbox" name="nome" value="s-z" /> S-Z</label>
                </div>
                <button onclick="cleanFilters()">Limpar</button>
            </aside>

            <div class="listagemDireita">
                <table class="tableProdutos">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Endereço</th>
                            <th>Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($user_data = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td>" . $user_data['nome'] . "</td>";
                            echo "<td>" . $user_data['telefone'] . "</td>";
                            echo "<td>" . $user_data['email'] . "</td>";
                            echo "<td>" . $user_data['logradouro'] . "</td>";
                            echo "<td>
                                    <a class='btnEditar' href='editar_clientes.php?id=" . $user_data['id'] . "'>Editar</a>
                                    <a class='btnExcluir' href='excluir_clientes.php?id=" . $user_data['id'] . "'>Excluir</a>
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
