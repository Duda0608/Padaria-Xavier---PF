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
    echo "<tr><th>Produto</th><th>Preço</th><th>Quantidade</th><th>Total</th><th>Ação</th></tr>";

    foreach ($_SESSION['carrinho'] as $idproduto => $quantidade) {

        $sql = "SELECT * FROM tb_produtos WHERE idprodutos = $idproduto";
        $res = mysqli_query($conexao, $sql);
        $produto = mysqli_fetch_array($res);

        if ($produto == null) continue;

        $nome = $produto['nome'];
        $preco = $produto['preco_venda'];
        $total_item = $preco * $quantidade;
        $total += $total_item;

        echo "<tr>";
        echo "<td>$nome</td>";
        echo "<td>R$ " . number_format($preco, 2, ',', '.') . "</td>";

        echo "<td>";
        echo "<form action='atualiza_carrinho.php' method='post'>";
        echo "<input type='hidden' name='id' value='$idproduto'>";
        echo "<input type='number' name='quantidade' value='$quantidade' min='1'>";
        echo "<input type='submit' value='Atualizar'>";
        echo "</form>";
        echo "</td>";

        echo "<td>R$ " . number_format($total_item, 2, ',', '.') . "</td>";
        echo "<td><a href='remover.php?id=$idproduto'>[Remover]</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<h3>Total da compra: R$ " . number_format($total, 2, ',', '.') . "</h3>";
}

    ?>

    <p>
        <a href="formpedido.php">[CONTINUAR COMPRANDO]</a><br>
        <a href="gravar.php">[FINALIZAR COMPRA]</a>
    </p>
</body>
</html>