<?php
session_start();

$id = $_POST['id'];
$qtd = $_POST['quantidade'];

if ($qtd < 1) {
    $qtd = 1;
}

if (isset($_SESSION['carrinho'][$id])) {
    $_SESSION['carrinho'][$id] = $qtd;
}