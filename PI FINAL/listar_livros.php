<?php
session_start();
include('conexao.php');

//if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
//    header('Location: login.php');
//    exit;}
//$logado = $_SESSION['email'];

$sql = "SELECT * FROM livros ORDER BY id DESC";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/listar_livro.css">
</head>
<body>

  <!-- TOPO -->
  
    <nav>
        <h3>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador)); ?></h3>
        <h1>LISTAGEM DE LIVROS</h1>
          <div class="menu">
            <button class="home"><a href="index.php"><img src="imagens/voltar.png"><h6>HOME</a><h6></button>
            <ul>
              <li class="menu-icon"><img src="imagens/332-3321096_mobile-menu-brown-menu-icon-png.png" alt="">
                  <ul>
                      <li class="menu-dropdown">Administrador
                          <ul class="menu-dropdown-right">
                              <li><a href="cadastrar-adm.php">Cadastrar</a></li>
                              <li><a href="listar-adm.php">Listar</a></li>
                          </ul>
                      </li>
                      <li class="menu-dropdown">Livros
                      <ul class="menu-dropdown-right">
                          <li><a href="cadastrar-livro.php">Cadastrar</a></li>
                          <li><a href="listar-livro.php">Listar</a></li>
                      </ul>
                      </li>
                      <li class="menu-dropdown">Gêneros
                          <ul class="menu-dropdown-right">
                              <li><a href="cadastrar-genero.php">Cadastrar</a></li>
                              <li><a href="listar-genero.php">Listar</a></li>
                          </ul>
                      </li>
                      <li class="menu-dropdown">Leitores
                          <ul class="menu-dropdown-right">
                              <li><a href="cadastrar-leitor.php">Cadastrar</a></li>
                              <li><a href="listar-leitor.php">Listar</a></li>
                          </ul>
                      </li>
                  </ul>
              </li>
          </ul>
          <button class="search"><input type="search" placeholder="Consultar..."> <img src="imagens/search-icon-png-21.png"></button>
          <button class="user"><a href="login.php"><img src="imagens/logout-icon-2048x2048-libuexip.png"><h6>SAIR</a><h6></button>
    </div>
    </nav>
    
  <!-- CONTEÚDO -->

  <div class="container">

    <!-- FILTRAGEM DO CONTEUDO -->

    <div class="content">
        <aside class="filter-menu">
            <h3>Filtros</h3>
          
            <!-- filtro por gênero -->

            <div class="filter-group">
                <label class="filter-title" data-target="genero-options">
                  Gênero
                  <img src="imagens/seta-baixo.png" class="arrow-icon">
                </label>
                <div id="genero-options" class="filter-options hidden">
                  <label><input type="checkbox" name="genero" value="todos"> Todos</label>
                  <label><input type="checkbox" name="genero" value="romance"> Romance</label>
                  <label><input type="checkbox" name="genero" value="ficcao"> Ficção</label>
                  <label><input type="checkbox" name="genero" value="aventura"> Aventura</label>
                </div>
              </div>
          
            <!-- Filtro por Nome -->

            <div class="filter-group">
                <label class="filter-title" data-target="nome-options">Nome <img src="imagens/seta-baixo.png" class="arrow-icon">
                </label>
                <div id="nome-options" class="filter-options hidden">
                    <label><input type="checkbox" name="nome" value="todos"> Todos</label>
                    <label><input type="checkbox" name="nome" value="a-f"> A-F</label>
                    <label><input type="checkbox" name="nome" value="g-l"> G-L</label>
                    <label><input type="checkbox" name="nome" value="m-r"> M-R</label>
                    <label><input type="checkbox" name="nome" value="s-z"> S-Z</label>
                </div>
              </div>
          
            <button onclick="cleanFilters()">Limpar</button>
          </aside>
      
      <div class="listagemDireita">
        <table class="tableProdutos">
          <thead>
            <tr>
              <th scope="col">Título</th>
              <th scope="col">Gênero</th>
              <th scope="col">Estoque</th>
              <th scope="col">Funções</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($user_data = mysqli_fetch_assoc($resultado)){
                echo "<tr>";
               /* echo "<td>".$user_data['Img']."</td>";*/
                echo "<td>".$user_data['titulo']."</td>";
                echo "<td>".$user_data['genero_id']."</td>";
                echo "<td>".$user_data['estoque']."</td>";
                echo "<td> 
                <a class='btnEditar' href='editar_livros.php?id=$user_data[id]'>Editar</a>
                <a class='btnExcluir' href='excluir_livros.php?id=$user_data[id]'>Excluir</a>
                </td>";
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
