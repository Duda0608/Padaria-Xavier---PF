<?php
require_once("verificarlogado.php");

$adm = $_SESSION['adm'];
// echo $adm;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
</head>

<body>
    <br>

    <?php
        if ($adm == '1') {
            echo "<li>";
            echo "<a href='formusuario.php'>Cadastrar Usuário</a><br>";
            echo "</li> <br>";
            echo "<li>";
            echo "<a href='listarusuarios.php'>Lista de Usuário</a><br>";
            echo "</li> <br>";
            echo "<li>";
            echo "<a href='listarpedido.php'>Listar pedidos existentes</a><br>";
            echo "</li> <br>";
            echo "<li>";
            echo "<a href='formprodutos.php'>Cadastrar Produtos</a><br>";
            echo "</li> <br>";
            echo "<li>";
            echo "<a href='listarprodutos.php'>Listar Produtos</a><br>";
            echo "</li> <br>";
            echo "<li>";
            echo "<a href='formcategoria.php'>Cadastrar categoria</a><br>";
            echo "</li> <br>";
            echo "<li>";
            echo "<a href='formpromocao.php'>Cadastrar Promoção</a><br>";
            echo "</li> <br>";
            echo "<li>";
            echo "<a href='listarprodutos.php'>Lista Produtos</a><br>";
            echo "</li> <br>";
            echo "<li>";
            echo "<a href='listarcategoria.php'>lista categoria</a><br>";
            echo "</li>";
        }
    ?>
    <li>
    <a href="formcomentario.php">Cadastrar Comentário</a>
    </li> <br>
    <li><a href="formpedido.php">Cadastrar Pedido</a>
    </li> <br>
    
    <a href="deslogar.php">Sair</a>
    <br><br>
</body>

</html>