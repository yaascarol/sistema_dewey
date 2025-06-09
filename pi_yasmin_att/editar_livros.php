<?php
session_start();
include_once ('conexao.php');

$nome_administrador = isset($_SESSION['nome_administrador']) ? $_SESSION['nome_administrador'] : '';

$id = '';
$titulo = '';
$resumo = '';
$genero_id = '';
$estoque = '';
$capa = '';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sqlSelect = "SELECT id, titulo, resumo, genero_id, estoque, capa FROM livros WHERE id=$id";
    $resultado = $conexao->query($sqlSelect);

    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }
    if ($resultado === false) {
        die("Erro na consulta: " . $conexao->error);
    }

    if ($resultado->num_rows > 0) {
        $user_data = mysqli_fetch_assoc($resultado);
        $titulo = $user_data['titulo'];
        $resumo = $user_data['resumo'];
        $genero_id = $user_data['genero_id'];
        $estoque = $user_data['estoque'];
        $capa = $user_data['capa'];
    } else {
        header('Location: listar_livros.php');
        exit();
    }
} else {
    header('Location: listar_livros.php');
    exit();
}

$resultGeneros = $conexao->query("SELECT id, nome_genero FROM generos ORDER BY nome_genero");
if ($resultGeneros === false) {
    die("Erro ao buscar gêneros: " . $conexao->error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/editar_livro.css">
</head>
<body>
    
    <nav>
        <?php if (!empty($nome_administrador)): ?>
            <h3>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador)); ?></h3>
        <?php endif; ?>
        <h1>EDITAR LIVROS</h1>
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
        <form class="dados" action="atualizar_livros.php" method="POST">
            <div id="dados-esquerda">
                <img id="capa" src="<?php echo htmlspecialchars($capa); ?>" alt="Capa do Livro" style="max-width: 200px; max-height: 300px; margin-top: 10px;" />
                <input type="url" name="capa" placeholder="URL da capa:" class="url-capa" value="<?php echo htmlspecialchars($capa); ?>" oninput="atualizarCapa()" />
                
                <input type="number" name="estoque" placeholder="Estoque:" class="estoque" value="<?php echo htmlspecialchars($estoque); ?>">
            </div>
            <div id="dados-direita">
                <div class="input-wrapper">
                    <input type="text" name="titulo" placeholder="Título do Livro:" class="titulo" value="<?php echo htmlspecialchars($titulo); ?>">
                </div>
                <div class="input-wrapper">
                    <select name="genero_id" class="genero_id">
                        <option value="">Selecione o Gênero</option>
                        <?php
                        while ($genero_row = $resultGeneros->fetch_assoc()) {
                            $selected = ($genero_row['id'] == $genero_id) ? 'selected' : '';
                            echo '<option value="' . htmlspecialchars($genero_row['id']) . '" ' . $selected . '>' . htmlspecialchars($genero_row['nome_genero']) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="input-wrapper">
                    <textarea class="resumo" name="resumo" placeholder="Resumo:"><?php echo htmlspecialchars($resumo); ?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                <input type="submit" name="update" id="update" value="Editar">
            </div>
        </form>
    </div>

    <script>
        function atualizarCapa() {
            const urlInput = document.querySelector('.url-capa');
            const capaImg = document.getElementById('capa');
            if (urlInput.value) {
                capaImg.src = urlInput.value;
            } else {
                capaImg.src = '';
            }
        }
    </script>
</body>
</html>