<?php
require_once "verificarlogado.php";
require_once "funcoes.php";
require_once "conexao.php";

$id = 0;
if ($_GET) {
$id = $_GET['id'];
}

if ($id > 0) {
$sql = "SELECT * FROM tb_pedidos WHERE idpedido = $id";
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);
$valor = $linha['valor'];
$data = $linha['data'];
$pagamento = $linha['pagamento'];
$entrega = $linha['entrega'];
$botao = "atualizar";
} else {
$valor = "";
$data = "";
$pagamento = "";
$entrega = "";
$botao = "cadastrar";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pedidos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container my-5">
<h1>Fazer Pedido</h1>

<form action="salvarpedido.php?id=<?php echo $id; ?>" method="post">

NOME DO CLIENTE:<br>
<input type="text" name="nome" class="form-control" required><br>

<h3>Selecione os produtos:</h3>
<ul>
<?php
$produtos = listarprodutos($conexao);
foreach ($produtos as $p) {
echo "<li>";
echo "<input type='checkbox' name='idprodutos[]' value='".$p['idprodutos']."'> R$ ".$p['preco_venda']." -- ".$p['nome_produto'];
echo " <input type='number' name='quantidade[".$p['idprodutos']."]' value='1' min='1'>";
echo "</li>";
}
?>
</ul>

FORMA DE PAGAMENTO:<br>
<input type="text" name="pagamento" class="form-control" value="<?php echo $pagamento; ?>"><br>

LOCAL DE ENTREGA:<br>
<input type="text" name="entrega" class="form-control" maxlength="20" placeholder="Máx. 20 caracteres" value="<?php echo $entrega; ?>"><br>

<input type="submit" value="<?php echo $botao; ?>" class="btn btn-success">
</form>
</div>
</body>
</html>
