<?php
session_start();
require_once('conexao.php');

$nome_administrador = isset($_SESSION['nome_administrador']) ? $_SESSION['nome_administrador'] : '';

$sql = "SELECT 
            l.id, 
            l.titulo, 
            l.estoque, 
            l.resumo, 
            l.capa, 
            g.nome_genero AS genero_nome 
        FROM 
            livros l
        JOIN 
            generos g ON l.genero_id = g.id
        ORDER BY 
            l.titulo DESC"; 

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
    <title>Listagem de Livros</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/listar_livros.css">
</head>

<body>

    <nav>
        <?php if (!empty($nome_administrador)): ?>
            <h3>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador)); ?></h3>
        <?php endif; ?>
        <h1>LISTA DE LIVROS</h1>
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
                            <th scope="col">ID</th>
                            <th scope="col">Capa</th>
                            <th scope="col">Título</th>
                            <th scope="col">Gênero</th>
                            <th scope="col">Estoque</th>
                            <th scope="col">Resumo</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($resultado->num_rows > 0) {
                                while($user_data = mysqli_fetch_assoc($resultado)){
                                    echo "<tr>";
                                    echo "<td>".$user_data['id']."</td>";
                                    echo "<td><img src='".htmlspecialchars($user_data['capa'])."' alt='Capa' style='width: 50px; height: auto;' /></td>";
                                    echo "<td>".htmlspecialchars($user_data['titulo'])."</td>";
                                    // Acessa o nome do gênero pelo alias 'genero_nome' definido na consulta SQL
                                    echo "<td>".htmlspecialchars($user_data['genero_nome'])."</td>";
                                    echo "<td>".htmlspecialchars($user_data['estoque'])."</td>";
                                    echo "<td>".htmlspecialchars($user_data['resumo'])."</td>";
                                    echo "<td> 
                                    <a class='btnEditar' href='editar_livros.php?id=".$user_data['id']."'>Editar</a>
                                    <a class='btnExcluir' href='excluir_livros.php?id=".$user_data['id']."'>Excluir</a>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>Nenhum livro encontrado.</td></tr>";
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