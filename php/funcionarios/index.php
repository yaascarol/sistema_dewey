<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Id Funcionario</th>
                <th>Nome</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $db = new SQLite3('../bancodedados.db');

            $results = $db->query('SELECT * FROM Funcionario');
            while ($row = $results->fetchArray()) {
               echo '<tr>';
                echo '<td>'.$row['ID'].'</td>';
                echo '<td>'.$row['Nome'].'</td>';
                echo '<td>'.$row['Email'].'</td>';
               echo '</tr>';
            }
        ?>
        </tbody>
    </table>
</body>
</html>


