<?php

if(isset($_GET['id'])) {
    
    require_once "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT *FROM tb_estoques WHERE idestoque = $id";

    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultado);

    $nome = $linha['nome'];
    $tipo = $linha['tipo'];
    $data = $linha['data'];
    $quantidade = $linha['qunatidade'];

    $botao = "atualizar";
} else {
    $id = 0;
    $nome = "";
    $tipo = "";
    $data = "";
    $quantidade = "";
    
    $botao = "cadastrar";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>cadastro de estoques</h1>

    <form action="salvarestoques.php" method="post">
        Nome:<br>
        <input type="text" name="nome"><br>
        tipo:<br>
        <input type="text" name="tipo"><br>
        data:<br>
        <input type="text" name="data"><br>
        quantidade:<br>
        <input type="text" name="quantidade"><br>

        <input type="submit" value="Cadastrar">
        
    </form>
</body>
</html>


