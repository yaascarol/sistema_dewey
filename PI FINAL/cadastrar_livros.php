<?php
require_once ('conexao.php');

if(isset($_POST['submit'])){
    $titulo = $_POST['titulo'];
    $genero_id = $_POST['genero_id'];
    $resumo = $_POST['resumo'];
    $estoque = $_POST['estoque'];

    $resultado = $conexao->query ("INSERT INTO livros(titulo, genero_id, resumo, estoque) 
    VALUES ('$titulo', '$genero_id', '$resumo', '$estoque')");

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
        <h3>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador)); ?></h3>
        <h1>CADASTRAR LIVROS</h1>
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
              
    <div class="container">
        <form class="dados" action="cadastrar_livros.php" method="POST">
            <div id="dados-esquerda">
                <img src="" alt="" id="capa">
                <input type="number" name="estoque" placeholder="Estoque:" class="estoque-livro" required>
            </div>
            <div id="dados-direita">
                <input type="text" name="titulo" placeholder="Título do Livro:" required class="titulo">
                <input type="text" name="genero_id" placeholder="Gênero do Livro:" class="genero">
                <textarea class="resumo" name="resumo" placeholder="Resumo:"></textarea>
                <button type="submit" name="submit">Cadastrar</button>
            </div>
        </form>
    </div>
    </div>

</body>
</html>
