<?php
session_start();
$id = $_GET['id'];

if ($id) {
if ($_SESSION['carrinho'][$id]) {
unset($_SESSION['carrinho'][$id]);
}
}

header("Location: carrinho.php");
exit;
?>
