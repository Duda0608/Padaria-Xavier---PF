<?php
session_start();

$id = $_GET['id'];

if (isset($_SESSION['carrinho'][$id])) {
    unset($_SESSION['carrinho'][$id]);
}

header("Location: carrinho.php");
exit;
