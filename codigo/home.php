<?php
require_once("verificarlogado.php");


$adm = $_SESSION['adm'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <br>

    <?php if ($adm == '1'): ?>
        <ul>
            <li><a href="formusuario.php">Cadastrar Usuário</a></li>
            <li><a href="listarusuarios.php">Lista de Usuário</a></li>
            <li><a href="listarpedido.php">Listar pedidos existentes</a></li>
            <li><a href="formprodutos.php">Cadastrar Produtos</a></li>
            <li><a href="listarprodutos.php">Listar Produtos</a></li>
            <li><a href="formcategoria.php">Cadastrar categoria</a></li>
            <li><a href="formpromocao.php">Cadastrar Promoção</a></li>
            <li><a href="listarcategoria.php">Lista categoria</a></li>
            <li><a href="listarpromocao.php">Lista categoria</a></li>
        </ul>
    <?php endif; ?>

    <ul>
        <li><a href="formcomentario.php">Cadastrar Comentário</a></li>
        <li><a href="formpedido.php">Cadastrar Pedido</a></li>
    </ul>

    <a href="deslogar.php">Sair</a>
    <br><br>
</body>

</html>
