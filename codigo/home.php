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
            <li><a href="formusuario.php">CADASTRAR USUÁRIO</a></li>
            <li><a href="listarusuarios.php">USUÁRIOS CADASTRADOS</a></li>
            <li><a href="listarpedido.php">PEDIDOS CADASTRADOS</a></li>
            <li><a href="formprodutos.php">CADASTRAR PRODUTOS</a></li>
            <li><a href="listarprodutos.php">PRODUTOS CADASTRADOS</a></li>
            <li><a href="formpromocao.php">CADASTRAR PROMOÇÃO</a></li>
            <li><a href="listarpromocao.php">PROMOÇÕES CADASTRADAS</a></li>
            <li><a href="formcategoria.php">CADASTRAR CATEGORIA</a></li>
            <li><a href="listarcategoria.php">CATEGORIAS CADASTRADAS</a></li>
        </ul>
    <?php endif; ?>

    <ul>
        <li><a href="formcomentario.php">CADASTRAR COMENTÁRIO</a></li>
        <li><a href="formpedido.php">CADASTRAR PEDIDOS</a></li>
        <li><a href="sobrenos.php">SOBRE NÓS<Script:module></Script:module></a></li>
    </ul>

    <a href="deslogar.php">SAIR</a>
    <br><br>
</body>

</html>
