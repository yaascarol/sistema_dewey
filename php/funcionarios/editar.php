<?php
  $db = new SQLite3('../bancodedados.db');
  $results = $db->querySingle('SELECT * FROM Funcionario WHERE ID = 1', true);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <div>
            <label>Nome: </label>
            <input type="text" value="<?php echo $results['Nome'] ?>">
        </div>
        <div>
            <label>Email </label>
            <input type="text" value="<?php echo $results['Email'] ?>">
        </div>
    </form>
</body>
</html>


