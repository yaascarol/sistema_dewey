<?php
session_start();
include_once('conexao.php');

$nome_administrador = '';

if (isset($_SESSION['admin_nome']) && !empty($_SESSION['admin_nome'])) {
    $nome_administrador = $_SESSION['admin_nome'];
}

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM administradores WHERE id=$id";
    $resultado = $conexao->query($sqlSelect);

    if ($resultado->num_rows > 0) {
        $user_data = mysqli_fetch_assoc($resultado);
        $nome = $user_data['nome'];
        $email = $user_data['email'];
        $senha = $user_data['senha'];
    } else {
        header('Location: listar_adm.php');
        exit();
    }
} else {
    header('Location: listar_adm.php');
    exit();
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
        <?php if (!empty($nome_administrador)) : ?>
            <h3>ADMINISTRADOR - <?php echo htmlspecialchars(strtoupper($nome_administrador)); ?></h3>
        <?php endif; ?>
        <h1>EDITAR ADMINISTRADOR</h1>
        <div class="menu">
            <button class="home">
                <a href="index.php"><img src="imagens/voltar.png"><h6>HOME</h6></a>
            </button>
            <ul>
                <li class="menu-icon">
                    <img src="imagens/332-3321096_mobile-menu-brown-menu-icon-png.png" alt="">
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
            <button class="search">
                <input type="search" placeholder="Consultar...">
                <img src="imagens/search-icon-png-21.png">
            </button>
            <button class="user">
                <a href="login.php"><img src="imagens/logout-icon-2048x2048-libuexip.png"><h6>SAIR</h6></a>
            </button>
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
