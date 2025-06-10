<?php
session_start();
include_once('conexao.php');

$nome_administrador = $_SESSION['nome_administrador'] ?? '';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM clientes WHERE id=$id";
    $resultado = $conexao->query($sqlSelect);

    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }
    if ($resultado === false) {
        die("Erro na consulta: " . $conexao->error);
    }

    if ($resultado->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($resultado)) {
            $nome = $user_data['nome'];
            $telefone = $user_data['telefone'];
            $email = $user_data['email'];
            $logradouro = $user_data['logradouro'];
            $numero = $user_data['numero'];
            $complemento = $user_data['complemento'];
            $cidade = $user_data['cidade'];
            $uf = $user_data['uf'];
            $cep = $user_data['cep'];
        }
    } else {
        header('Location: listar_clientes.php');
        exit();
    }
} else {
    header('Location: listar_clientes.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/editar_clientes.css">
</head>

<body>

    <nav>
        <h3>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador ?? '')); ?></h3>
        <h1>EDITAR CLIENTE</h1>
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
        <form class="dados" action="atualizar_clientes.php" method="POST">
            <div id="dados-esquerda">
            <div class="input-wrapper">
                    <input type="text" name="nome" placeholder="Nome:" class="nome" value="<?php echo htmlspecialchars($nome ?? ''); ?>">
                </div>
                <div class="input-wrapper">
                    <input type="tel" name="telefone" placeholder="Telefone:" class="telefone" value="<?php echo htmlspecialchars($telefone ?? ''); ?>">
                </div>
                <div class="input-wrapper">
                    <input type="email" name="email" placeholder="E-mail:" class="email" value="<?php echo htmlspecialchars($email ?? ''); ?>">
                </div>
            </div>
            <div id="dados-direita">
                <div class="endereco1">
                    <div class="input-wrapper">
                        <input type="text" name="logradouro" placeholder="Logradouro:" class="logradouro" value="<?php echo htmlspecialchars($logradouro ?? ''); ?>">
                    </div>
                    <div class="input-wrapper">
                        <input type="text" name="numero" placeholder="Número:" class="numero" value="<?php echo htmlspecialchars($numero ?? ''); ?>">
                    </div>
                    <div class="input-wrapper">
                        <input type="text" name="complemento" placeholder="Complemento:" class="complemento" value="<?php echo htmlspecialchars($complemento ?? ''); ?>">
                    </div>
                </div>
                <div class="endereco2">
                    <div class="input-wrapper">
                        <input type="text" name="cidade" placeholder="Cidade:" class="cidade" value="<?php echo htmlspecialchars($cidade ?? ''); ?>">
                    </div>
                    <div class="input-wrapper">
                        <input type="text" name="uf" placeholder="UF:" class="uf" value="<?php echo htmlspecialchars($uf ?? ''); ?>">
                    </div>
                    <div class="input-wrapper">
                        <input type="text" name="cep" placeholder="CEP:" class="cep" value="<?php echo htmlspecialchars($cep ?? ''); ?>">
                    </div>
                </div>
                <ul class="sugestoes"></ul>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id ?? ''); ?>">
                <input type="submit" name="update" id="editar_clientes" value="Editar">
            </div>
        </form>
    </div>

    <script src="editleitor-script.js"></script>
</body>

</html>