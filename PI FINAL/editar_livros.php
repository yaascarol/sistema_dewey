<?php
include_once ('conexao.php');

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM livros WHERE id=$id";
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
    $titulo = $user_data['titulo'];
    $resumo = $user_data['resumo'];
    $genero_id = $user_data['genero_id'];
    $estoque = $user_data['estoque'];
}
    }
    else{
        header('Location: listar_livros.php');
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/editar_livro.css"></head>
<body>
    <nav>
        <h3>ADMINISTRADOR - (NOME)</h3>
        <h1>EDITAR LIVRO</h1>
        <div class="menu">
            <ul>
                <li class="menu-icon"><img src="imagens/332-3321096_mobile-menu-brown-menu-icon-png - Copia.png" alt="">
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
                <button class="user">
                    <a href="login.html">
                        <img src="imagens/logout-icon-2048x2048-libuexip.png">
                        <h6>SAIR</h6>
                    </a>
                </button>
        </div>
    </nav>
    <div class="container">
        <form class="dados" action="atualizar_livros.php" method="POST">
>
            <div id="dados-esquerda">
                <input type="image" id="capa" img src=""></input>
                <input type="number" name="estoque" placeholder="Estoque:" class="estoque" value="<?php echo $estoque ?>">
            </div>
            <div id="dados-direita">
                <div class="input-wrapper">
                    <input type="text" name="titulo" placeholder="Título do Livro:" class="titulo" value="<?php echo $titulo ?>">
                </div>
                <div class="input-wrapper">
                    <input type="number" name="genero_id" placeholder="Gênero do Livro:" class="genero_id" value="<?php echo $genero_id ?>">
                </div>
                <div class="input-wrapper">
                    <textarea class="resumo" name="resumo" placeholder="Resumo:"><?php echo htmlspecialchars($resumo); ?></textarea>
                </div>
                <input type="hidder" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update" value="Editar">
            </div>
        </form>
    </div>
    </div>

    <script src="editlivro-script.js"></script>

</body>
</html>