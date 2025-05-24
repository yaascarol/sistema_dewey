<?php
session_start();
include('conexao.php');

//if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
//    header('Location: login.php');
//    exit;}
//$logado = $_SESSION['email'];

$sql = "SELECT * FROM leitores ORDER BY id DESC";
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
    <h3>SISTEMA DEWEY - (NOME)</h3>
    <h1>LISTA DE LEITORES</h1>
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
                      <li><a href="cadastrar_livro.html">Cadastrar</a></li>
                      <li><a href="editar_livro.html">Editar</a></li>
                      <li><a href="listar_livro.html">Listar</a></li>
                  </ul>
                  </li>
                  <li class="menu-dropdown">Gêneros
                      <ul class="menu-dropdown-right">
                          <li><a href="cadastrar_genero.html">Cadastrar</a></li>
                          <li><a href="editar_genero.html">Editar</a></li>
                          <li><a href="listar_genero.html">Listar</a></li>
                      </ul>
                  </li>
                  <li class="menu-dropdown">Leitores
                      <ul class="menu-dropdown-right">
                          <li><a href="cadastrar_leitor.html">Cadastrar</a></li>
                          <li><a href="editar_leitor.html">Editar</a></li>
                          <li><a href="listar_leitor.html">Listar</a></li>
                      </ul>
                  </li>
              </ul>
          </li>
      </ul>
      <button class="search"><input type="search" placeholder="Consultar..."> <img src="imagens/search-icon-png-21.png"></button>
      <button class="user"><a href="login.html"><img src="imagens/logout-icon-2048x2048-libuexip.png"><h6>SAIR</a><h6></button>
</div>
</nav>
    
  <!-- CONTEÚDO -->

  <div class="container">

    <!-- FILTRAGEM DO CONTEUDO -->

    <div class="content">
      <aside class="filter-menu">
        <h3>Filtros</h3>
        <div class="filter-group">

          <label ><input type="checkbox" name="nome" value="todos"> Todos</label>
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
              <th scope="col">Imagem</th>
              <th scope="col">Nome</th>
              <th scope="col">Telefone</th>
              <th scope="col">E-mail</th>
              <th scope="col">Endereço</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($user_data = mysqli_fetch_assoc($resultado)){
                echo "<tr>";
                echo "<td>".$user_data['Nome']."</td>";
                echo "<td>".$user_data['Contato']."</td>";
                echo "<td>".$user_data['Email']."</td>";
                }
                ?>
            <tr>
              <td>
                <div class="produtoImg">150x115</div>
              </td>
              <td>{Nome do Leitor}</td>
              <td>{Telefone}</td>
              <td>{E-mail}</td>
              <td>{Endereço}</td>
              <td>
                <button class="btnEditar"><a href="editar-leitor.html">Editar</a></button>
                <button class="btnExcluir">Excluir</button>
              </td>
            </tr>
      
            <tr>
              <td>
                <div class="produtoImg">150x115</div>
              </td>
              <td>{Nome do Leitor}</td>
              <td>{Telefone}</td>
              <td>{E-mail}</td>
              <td>{Endereço}</td>
              <td>
                <button class="btnEditar"><a href="editar-leitor.html">Editar</a></button>
                <button class="btnExcluir">Excluir</button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="produtoImg">150x115</div>
              </td>
              <td>{Nome do Leitor}</td>
              <td>{Telefone}</td>
              <td>{E-mail}</td>
              <td>{Endereço}</td>
              <td>
                <button class="btnEditar"><a href="editar-leitor.html">Editar</a></button>
                <button class="btnExcluir">Excluir</button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="produtoImg">150x115</div>
              </td>
              <td>{Nome do Leitor}</td>
              <td>{Telefone}</td>
              <td>{E-mail}</td>
              <td>{Endereço}</td>
              <td>
                <button class="btnEditar"><a href="editar-leitor.html">Editar</a></button>
                <button class="btnExcluir">Excluir</button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="produtoImg">150x115</div>
              </td>
              <td>{Nome do Leitor}</td>
              <td>{Telefone}</td>
              <td>{E-mail}</td>
              <td>{Endereço}</td>
              <td>
                <button class="btnEditar"><a href="editar-leitor.html">Editar</a></button>
                <button class="btnExcluir">Excluir</button>
              </td>
            </tr>
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