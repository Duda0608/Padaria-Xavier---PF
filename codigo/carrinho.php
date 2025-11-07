<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carrinho</title>
</head>

<body>
<h1>Carrinho</h1>

<?php
if (!$_SESSION['carrinho']) {
echo "carrinho vazio";
} else {
$total = 0;
echo "<table border='1'>";
echo "<tr>";
echo "<td>Nome</td>";
echo "<td>Preço</td>";
echo "<td>Quantidade</td>";
echo "<td>Total unitário</td>";
echo "<td>Remover</td>";
echo "</tr>";

foreach ($_SESSION['carrinho'] as $id => $quantidade) {
$produto = pesquisarprodutosid($conexao, $id);
echo "<tr>";
echo "<td>".$produto['nome']."</td>";
echo "<td> R$ ".$produto['preco_venda']."</td>";
echo "<td>".$quantidade."</td>";
$total_unitario = $produto['preco_venda'] * $quantidade;
$total = $total + $total_unitario;
echo "<td> R$ ".$total_unitario."</td>";
echo "<td><a href='remover.php?id=".$id."'>[remover]</a></td>";
echo "</tr>";
}
echo "</table>";
echo "<h3>Total da compra: R$ ".$total."</h3>";
echo "<a href='finalizar_venda.php'>finalizar pedido</a>";
}
?>
</body>
</html>