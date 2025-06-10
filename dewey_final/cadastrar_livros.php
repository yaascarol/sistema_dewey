<?php
session_start();
require_once('conexao.php');

$nome_administrador = isset($_SESSION['nome_administrador']) ? $_SESSION['nome_administrador'] : '';

if (isset($_POST['submit'])) {
    $titulo = $conexao->real_escape_string($_POST['titulo']);
    $genero_id = (int)$_POST['genero_id'];
    $resumo = $conexao->real_escape_string($_POST['resumo']);
    $estoque = (int)$_POST['estoque'];
    $url_capa = $conexao->real_escape_string($_POST['url_capa']);

    $checkGenero = $conexao->query("SELECT id FROM generos WHERE id = $genero_id");
    if ($checkGenero->num_rows == 0) {
        die("Gênero inválido!");
    }

    $conexao->query("INSERT INTO livros (titulo, genero_id, resumo, estoque, capa) VALUES ('$titulo', $genero_id, '$resumo', $estoque, '$url_capa')");

    $livro_id = $conexao->insert_id;

    $conexao->query("INSERT INTO imagens (livro_id, caminho, descricao) VALUES ($livro_id, '$url_capa', 'Capa do livro')");

    header('Location: listar_livros.php');
    exit;
}

$resultGeneros = $conexao->query("SELECT id, nome_genero FROM generos ORDER BY nome_genero");
?>
    
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livros</title> <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/cadastrar_livros.css"> </head>
<body>
    
    <nav>
        <?php if (!empty($nome_administrador)): ?>
            <h3>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador)); ?></h3>
        <?php endif; ?>
        <h1>CADASTRAR LIVROS</h1> <div class="menu">
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
                      <li class="menu-dropdown">Leitores
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
        <form class="dados" action="cadastrar_livros.php" method="POST">
            <div id="dados-esquerda">
                <img src="" alt="capa do livro" id="capa" style="max-width: 200px; max-height: 300px; margin-top: 10px;" />
                <input type="url" name="url_capa" placeholder="URL da capa:" class="url-capa" oninput="atualizarCapa()" required />
                <input type="number" name="estoque" placeholder="Estoque:" class="estoque-livro" required />
            </div>
            <div id="dados-direita">
                <input type="text" name="titulo" placeholder="Título do Livro:" required class="titulo" />

                <select name="genero_id" class="genero" required>
                    <option value="">Selecione o gênero</option>
                    <?php
                    while ($row = $resultGeneros->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nome_genero']) . '</option>';
                    }
                    ?>
                </select>

                <textarea class="resumo" name="resumo" placeholder="Resumo:"></textarea>
                <button type="submit" name="submit">Cadastrar</button>
            </div>
        </form>
    </div>

    <script>
        function atualizarCapa() {
            const urlInput = document.querySelector('.url-capa');
            const capaImg = document.getElementById('capa');
            capaImg.src = urlInput.value;
        }
    </script>
              
</body>
</html>