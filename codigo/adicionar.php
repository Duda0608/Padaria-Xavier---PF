<?php
session_start();

$carrinho = $_SESSION['carrinho'];

if (!$carrinho) {
$_SESSION['carrinho'] = [];
}

if ($_POST) {
$selecionados = $_POST['idproduto'];

if ($selecionados) {
foreach ($selecionados as $id) {
$quantidade = $_POST['quantidade'][$id];
if ($quantidade < 1) {
$quantidade = 1;
}
if ($_SESSION['carrinho'][$id]) {
$_SESSION['carrinho'][$id] = $_SESSION['carrinho'][$id] + $quantidade;
} else {
$_SESSION['carrinho'][$id] = $quantidade;
}
}
}
}

header("Location: carrinho.php");
exit;
?>