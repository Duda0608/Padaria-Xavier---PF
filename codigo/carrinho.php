<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>CARRINHO</title>
</head>
<body>
    <h2>SEU CARRINHO</h2>

    <?php
    if (empty($_SESSION['carrinho'])) {
        echo "CARRINHO VAZIO";
    } else {
        $total = 0;
        echo "<table border='1'>";
        echo "<tr><th>Pedido</th><th>Valor</th><th>Quantidade</th><th>Total</th><th>Ação</th></tr>";

        foreach ($_SESSION['carrinho'] as $iditem_pedido => $quantidade) {
            if (is_array($quantidade) || $quantidade < 1) {
                $quantidade = 1;
            }

            $sql = "SELECT * FROM tb_pedidos WHERE id_item_pedidos = $iditem_pedido";
            $res = mysqli_query($conexao, $sql);
            $pedido = mysqli_fetch_array($res);

            if ($pedido == null) continue;

            $nome = "Pedido #" . $pedido['iditem_pedido'];
            $preco = $pedido['valor'];
            $total_item = $preco * $quantidade;
            $total += $total_item;

            echo "<tr>";
            echo "<td>$nome</td>";
            echo "<td>R$ $preco</td>";

            // Formulário para atualizar quantidade
            echo "<td>";
            echo "<form action='atualiza_carrinho.php' method='post'>";
            echo "<input type='hidden' name='id' value='$iditem_pedido'>";
            echo "<input type='number' name='quantidade' value='$quantidade' min='1'>";
            echo "<input type='submit' value='Atualizar'>";
            echo "</form>";
            echo "</td>";

            echo "<td>R$ $total_item</td>";
            echo "<td><a href='remover.php?id=$idpedido'>[Remover]</a></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<h3>Total da compra: R$ $total</h3>";
    }
    ?>

    <p>
        <a href="formpedido.php">[CONTINUAR COMPRANDO]</a><br>
        <a href="gravar.php">[FINALIZAR COMPRA]</a>
    </p>
</body>
</html>