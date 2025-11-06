<?php
require_once "verificarlogado.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="estilo.css">

<body>
    <h1>LISTA DE PEDIDOS</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";
    require_once "verificarlogado.php";

    $lista_pedido = listarpedido($conexao);

    if (count($lista_pedido) == 0) {
        echo "NÃO HÁ PEDIDOS";
    } else {
    ?>
        <table class="table table-striped-columns" border="1">
            <tr>
                <td>ID</td>
                <td>VALOR</td>
                <td>DATA</td>
                <td>PAGAMENTO</td>
                <td>ENTREGA</td>
                <td colspan="2">AÇÃO</td>
            </tr>

            <?php
            foreach ($lista_pedido as $pedido) {
                $idpedido = $pedido['idpedido'];
                $valor = $pedido['valor'];
                $data = $pedido['data'];
                $pagamento = $pedido['pagamento'];
                $entrega = $pedido['entrega'];

                echo "<tr>";
                echo "<td>$idpedido</td>";
                echo "<td>$valor</td>";
                echo "<td>$data</td>";
                echo "<td>$pagamento</td>";
                echo "<td>$entrega</td>";
                echo "<td><a href='formpedido.php?id=$idpedido'>EDITAR</a></td>";
                echo "<td><a href='deletarpedido.php?id=$idpedido'>EXCLUIR</a></td>";
                echo "</tr>";
            }
        }
            ?>
        </table>

        <a href="home.php">SAIR</a>
        <br><br>
</body>

</html>