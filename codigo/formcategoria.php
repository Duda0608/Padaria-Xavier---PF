<?php

require_once "verificarlogado.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>categoria</h1>

    <form action="salvarcategoria.php" method="post">
        Nome:<br>
        <input type="text" name="nome"><br>
        descriçao:<br>
        <input type="text" name="descricao"><br>

        <input type="submit" value="Cadastrar">
        
    </form>
</body>
</html>

