<?php
require_once ('conexao.php');

if(isset($_POST['submit'])){
    $Titulo = $_POST['Titulo'];
    $Resumo = $_POST['Resumo'];
    $Genero = $_POST['Genero'];
    $Estoque = $_POST['Estoque'];

    $conexao->query("INSERT INTO Livros (Titulo, Resumo, Genero, Estoque) VALUES ('$Titulo', '$Resumo', '$Genero', '$Estoque')");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="nav-bar.css">
    <link rel="stylesheet" href="cadastrar-livro.css">
    <style>
        /* extra opcional só para ver a cor quando ativar */
        #dados-direita button:disabled {
            background-color: #DBCDBC;
            color: #ffffff;
            cursor: not-allowed;
        }

        #dados-direita button.enabled {
            background-color: #ee7c2a;
            color: white;
        }
    </style>
</head>
<body>
    <nav>
        <!-- seu nav aqui -->
    </nav>

    <div class="container">
        <form class="dados" action="cadastrar-livro.php" method="POST" id="form-livro">
            <div id="dados-esquerda">
                <img src="" alt="" id="capa">
                <input type="number" name="Estoque" placeholder="Estoque:" class="estoque-livro" required>
            </div>
            <div id="dados-direita">
                <input type="text" name="Titulo" placeholder="Título do Livro:" required class="titulo">
                <input type="text" name="Genero" placeholder="Gênero do Livro (ID):" class="genero" required>
                <textarea class="resumo" name="Resumo" placeholder="Resumo:" required></textarea>
                <button type="submit" name="submit" disabled>Cadastrar</button>
            </div>
        </form>
    </div>

    <script>
        const form = document.getElementById('form-livro');
        const inputs = form.querySelectorAll('input[required], textarea[required]');
        const botao = form.querySelector('button');

        function verificarCampos() {
            let preenchido = true;
            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    preenchido = false;
                }
            });

            if (preenchido) {
                botao.disabled = false;
                botao.classList.add('enabled');
            } else {
                botao.disabled = true;
                botao.classList.remove('enabled');
            }
        }

        inputs.forEach(input => {
            input.addEventListener('input', verificarCampos);
        });

        // Verifica ao carregar a página (se já vierem preenchidos)
        verificarCampos();
    </script>
</body>
</html>