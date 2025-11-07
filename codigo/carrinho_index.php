<?php
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
<a href="destruir_carrinho.php">destruir carrinho</a>
<a href="carrinho.php">ver carrinho</a>

<form action="adicionar.php" method="post">
<h2>Lista de Produtos</h2>
<ul>
<?php
$produtos = listarProdutos($conexao);
foreach ($produtos as $p) {
echo "<li>";
echo "<input type='checkbox' name='idproduto[]' value='".$p['idprodutos']."'> R$ ".$p['preco_venda']." -- ".$p['nome'];
echo " <input type='number' name='quantidade[".$p['idprodutos']."]' value='1' min='1'>";
echo "</li>";
}
?>
</ul>
<input type="submit" value="Adicionar selecionados ao carrinho">
</form>
</body>
</html>