<?php
require_once "conexao.php";
require_once "funcoes.php";
session_start();

$id = 0;
if ($_GET) {
$id = $_GET['id'];
}

$nome = $_POST['nome'];
$pagamento = $_POST['pagamento'];
$entrega = $_POST['entrega'];
$entrega = substr($entrega, 0, 45);
$data = date('Y-m-d');
$valor = 0;
$tb_cliente_idcliente = 2;

if ($_POST) {
if (array_key_exists('idprodutos', $_POST)) {
$selecionados = $_POST['idprodutos'];
foreach ($selecionados as $idproduto) {
$quantidade = $_POST['quantidade'][$idproduto];
$sql = "SELECT preco_venda FROM tb_produtos WHERE idprodutos = $idproduto";
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);
$preco = $linha['preco_venda'];
$total_item = $preco * $quantidade;
$valor = $valor + $total_item;
}
}
}

if ($id == 0) {
$idpedido = salvarpedido($conexao, $valor, $data, $pagamento, $entrega, $tb_cliente_idcliente);

if ($_POST) {
if (array_key_exists('idprodutos', $_POST)) {
foreach ($selecionados as $idproduto) {
$quantidade = $_POST['quantidade'][$idproduto];
salvaritempedido($conexao, $quantidade, $idpedido, $idproduto);
}
}
}

header("Location: home.php");
exit;
} else {
editarpedido($conexao, $valor, $data, $pagamento, $entrega, $id);
header("Location: listarpedido.php");
exit;
}
?>