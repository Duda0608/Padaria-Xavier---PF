<?php
require_once "verificarlogado.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE PROMOÇÕES</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="estilo.css">

<body>
    <h1>LISTA DE PROMOÇÕES</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $lista_promocao = listarpromocao($conexao);

    if (count($lista_promocao) == 0) {
        echo "Não existe promoção";
    } else {
    ?>
        <table class="table table-striped-columns" border="1">
            <tr>
                <td>ID</td>
                <td>DATA INÍCIO</td>
                <td>DATA FINAL</td>
                <td>VALOR</td>
                <td>PRODUTO</td>
                <td colspan="2">AÇÃO</td>
            </tr>

            <?php
            foreach ($lista_promocao as $promocao) {
                $idpromocao = $promocao['idpromocao'];
                $datainicio = $promocao['datainicio'];
                $datafinal = $promocao['datafinal'];
                $valor = $promocao['valor'];
                $nome_produtos = $promocao['nome_produtos'];

                echo "<tr>";
                echo "<td>$idpromocao</td>";
                echo "<td>$datainicio</td>";
                echo "<td>$datafinal</td>";
                echo "<td>$valor</td>";
                echo "<td>$nome_produtos</td>";
                echo "<td><a href='formpromocao.php?id=$idpromocao'>EDITAR</a></td>";
                echo "<td><a href='deletarpromocao.php?id=$idpromocao'>EXCLUIR</a></td>";
                echo "</tr>";
            }
            ?>
        </table>

    <?php } ?>

    <a href="home.php">SAIR</a>
    <br><br>

</body>

</html>