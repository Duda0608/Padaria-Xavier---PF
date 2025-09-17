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
    <h1>Lista de pedidos</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";
    require_once "verificarlogado.php";

    $lista_pedido = listarpedido($conexao);

    if (count($lista_pedido) == 0) {
        echo "Não ha pedidos";
    
    } else {
    ?>

        <table border="1">
            <tr>
                <td>id</td>
                <td>valor</td>
                <td>data</td>
                <td>avaliacao</td>
                <td>pagamento</td>
                <td>entrega</td>
                <td>status</td>
                <td colspan="2">açao</td>
            </tr>

        <?php
        foreach ($lista_pedido as $pedido) {
            $idpedido = $pedido['idpedido'];
            $valor = $pedido['valor'];
            $data = $pedido['data'];
            $avaliacao = $pedido['avaliacao'];
            $pagamento = $pedido['pagamento'];
            $entrega = $pedido['entrega'];
            $status = $pedido['status'];


            echo "<tr>";
            echo "<td>$idpedido</td>";
            echo "<td>$valor</td>";
            echo "<td>$data</td>";
            echo "<td>$avaliacao</td>";
            echo "<td>$pagamento</td>";
            echo "<td>$entrega</td>";
            echo "<td>$status</td>";


            echo "<td><a href='formpedido.php?id=$idpedido'>Editar</a></td>";
            echo "<td><a href='deletarpedido.php?id=$idpedido'>Excluir</a></td>";
            echo "</tr>";


        }
    }
        ?>
        </table>
        </body>

</html>