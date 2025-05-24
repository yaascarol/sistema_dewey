<?php
require_once 'conexao.php';

if (!isset($_GET['id'])) {
    echo "ID do livro não especificado.";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM livros WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    echo "Livro não encontrado.";
    exit;
}

$livro = $resultado->fetch_assoc();
?>

<h2>Editar Livro</h2>
<form action="atualizar_livro.php" method="POST">
    <input type="hidden" name="id" value="<?= $livro['ID'] ?>">
    <label>Título: <input type="text" name="titulo" value="<?= $livro['titulo'] ?>" required></label><br>
    <label>Gênero: <input type="text" name="genero" value="<?= $livro['genero'] ?>" required></label><br>
    <label>Resumo: <textarea name="resumo"><?= $livro['resumo'] ?></textarea></label><br>
    <label>Estoque: <input type="number" name="estoque" value="<?= $livro['estoque'] ?>" min="0"></label><br>
    <button type="submit">Atualizar</button>
</form>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/nav-bar.css">
    <link rel="stylesheet" href="CSS/editar_livro.css"></head>
<body>
    <nav>
        <h3>ADMINISTRADOR - (NOME)</h3>
        <h1>EDITAR LIVRO</h1>
        <div class="menu">
            <ul>
                    <li class="menu-icon"><img src="../imagens/332-3321096_mobile-menu-brown-menu-icon-png.png" alt="">
                        <ul>
                            <li class="menu-dropdown">Livros
                            <ul class="menu-dropdown-right">
                                <li><a href="cadastrar-livro.html">Cadastrar</a></li>
                                <li><a href="editar_livro.html">Editar</a></li>
                                <li><a href="listar_livro.html">Listar</a></li>
                            </ul>
                            </li>
                            <li class="menu-dropdown">Gêneros
                                <ul class="menu-dropdown-right">
                                    <li><a href="cadastrar-genero.html">Cadastrar</a></li>
                                    <li><a href="editar-genero.html">Editar</a></li>
                                    <li><a href="listar-genero.html">Listar</a></li>
                                </ul>
                            </li>
                            <li class="menu-dropdown">Leitores
                                <ul class="menu-dropdown-right">
                                    <li><a href="cadastrar-leitor.html">Cadastrar</a></li>
                                    <li><a href="editar-leitor.html">Editar</a></li>
                                    <li><a href="listar-leitor.html">Listar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <button class="search"><input type="search" placeholder="Consultar..."> <img src="../imagens/search-icon-png-21.png"></button>
                <button class="user"><a href="../login/login.html"><img src="../imagens/logout-icon-2048x2048-libuexip.png"><h6>SAIR</a><h6></button>
        </div>
    </nav>


    <div class="container">
        <form class="dados">
            <div id="dados-esquerda">
                <input type="image" id="capa" img src=""></input>
                <input type="number" name="estoque" placeholder="Estoque:" class="estoque">
            </div>
            <div id="dados-direita">
                <div class="input-wrapper">
                    <input type="text" name placeholder="Título do Livro:" class="titulo">
                </div>
                <div class="input-wrapper">
                    <input type="text" name="genero" placeholder="Gênero do Livro:" class="genero">
                </div>
                <div class="input-wrapper">
                    <textarea class="resumo" name="resumo" placeholder="Resumo:"></textarea>
                </div>
                <ul class="sugestoes"></ul>
                <button id="editar-livro">Editar</button>
            </div>
        </form>
    </div>
    </div>

    <script src="editlivro-script.js"></script>

</body>
</html>