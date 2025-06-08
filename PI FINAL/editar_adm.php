<?php
include_once ('conexao.php');

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM administradores WHERE id=$id";
    $resultado = $conexao->query($sqlSelect);
    
if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }
if ($resultado === false) {
        die("Erro na consulta: " . $conexao->error);
    }

if($resultado->num_rows > 0){
    while($user_data = mysqli_fetch_assoc($resultado))
{
    $nome = $user_data['nome'];
    $email = $user_data['email'];
    $senha = $user_data['senha'];
}
    }
    else{
        header('Location: listar_adm.php');
    }
} else {
    header('Location: listar_adm.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Administrador</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/editar_adm.css">
</head>

<body>
    
        <nav>
        <h3>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador)); ?></h3>
        <h1>EDITAR ADMINISTRADOR</h1>
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
        <form class="dados" action="atualizar_adm.php" method="POST">
            <div id="dados-esquerda">
                <div id="capa"></div>
            </div>
            <div id="dados-direita">
                <div class="input-wrapper">
                    <input type="text" name="nome" placeholder="Usuário:" class="usuario"
                        value="<?php echo htmlspecialchars($nome); ?>">
                </div>
                <div class="input-wrapper">
                    <input type="email" name="email" placeholder="E-mail:" class="email"
                        value="<?php echo htmlspecialchars($email); ?>">
                </div>
                <div class="input-wrapper">
                    <input type="text" name="senha" placeholder="Senha:" class="senha"
                        value="<?php echo htmlspecialchars($senha); ?>">
                </div>
                <ul class="sugestoes"></ul>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                <input type="submit" name="update" id="update" value="Editar">
            </div>
        </form>
    </div>
    <script src="editadm_script.js"></script>
</body>

</html>
