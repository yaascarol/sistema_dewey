<?php
session_start();
require_once('conexao.php');

$nome_administrador = isset($_SESSION['admin_nome']) ? $_SESSION['admin_nome'] : '';

$limite_por_pagina = 5;

$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

if ($pagina_atual < 1) {
    $pagina_atual = 1;
}

$offset = ($pagina_atual - 1) * $limite_por_pagina;

$total_clientes_query = $conexao->query("SELECT COUNT(*) as total FROM clientes");
$total_clientes = 0;
if ($total_clientes_query && $row = $total_clientes_query->fetch_assoc()) {
    $total_clientes = $row['total'];
}

$total_paginas = ceil($total_clientes / $limite_por_pagina);

if ($pagina_atual > $total_paginas && $total_paginas > 0) {
    $pagina_atual = $total_paginas;
    $offset = ($pagina_atual - 1) * $limite_por_pagina;
} elseif ($total_paginas == 0) {
    $offset = 0;
    $pagina_atual = 1;
}

$sql = "SELECT 
            id, 
            nome, 
            telefone, 
            email, 
            logradouro, 
            numero, 
            complemento, 
            cidade, 
            uf, 
            cep 
        FROM 
            clientes
        ORDER BY 
            nome ASC
        LIMIT $limite_por_pagina OFFSET $offset";

$resultado = $conexao->query($sql);

if ($resultado === false) {
    die("Erro na consulta: " . $conexao->error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Clientes</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/listar_clientes.css">
    <style>
        .paginacao {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            padding: 10px 0;
        }

        .botao-paginacao {
            display: inline-block;
            padding: 8px 15px;
            margin: 0 5px;
            border: 1px solid #ccc;
            border-radius: 20px;
            text-decoration: none;
            color: #333;
            background-color: #f5f5f5;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
            font-weight: bold;
        }

        .botao-paginacao:hover {
            background-color: #e0e0e0;
            border-color: #aaa;
        }

        .botao-paginacao.ativo {
            background-color: #8B4513;
            color: white;
            border-color: #8B4513;
        }
    </style>
</head>

<body>

    <nav>
        <?php if (!empty($nome_administrador)): ?>
            <h3>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador)); ?></h3>
        <?php endif; ?>
        <h1>LISTA DE CLIENTES</h1>
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
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Logradouro</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($resultado->num_rows > 0) {
                                while($user_data = mysqli_fetch_assoc($resultado)){
                                    echo "<tr>";
                                    echo "<td>".htmlspecialchars($user_data['nome'])."</td>";
                                    echo "<td>".htmlspecialchars($user_data['telefone'])."</td>";
                                    echo "<td>".htmlspecialchars($user_data['email'])."</td>";
                                    echo "<td>".htmlspecialchars($user_data['logradouro'])."</td>";
                                    echo "<td> 
                                    <a class='btnEditar' href='editar_clientes.php?id=".$user_data['id']."'>Editar</a>
                                    <a class='btnExcluir' href='excluir_clientes.php?id=".$user_data['id']."'>Excluir</a>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='11'>Nenhum cliente encontrado.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="paginacao">
            <?php if ($total_paginas > 1): ?>
                <?php if ($pagina_atual > 1): ?>
                    <a href="listar_clientes.php?pagina=<?php echo $pagina_atual - 1; ?>" class="botao-paginacao">Anterior</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                    <a href="listar_clientes.php?pagina=<?php echo $i; ?>" 
                       class="botao-paginacao <?php echo ($i == $pagina_atual) ? 'ativo' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>

                <?php if ($pagina_atual < $total_paginas): ?>
                    <a href="listar_clientes.php?pagina=<?php echo $pagina_atual + 1; ?>" class="botao-paginacao">Próximo</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>
