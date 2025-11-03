<?php
session_start();

// Garante que o carrinho existe
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (!empty($_POST['idprodutos'])) {

    foreach ($_POST['idprodutos'] as $id) {

        // agora quantidade usa o ID do produto como índice
        $quantidade = $_POST['quantidade'][$id];

        if ($quantidade < 1) {
            $quantidade = 1;
        }

        if (isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] += $quantidade;
        } else {
            $_SESSION['carrinho'][$id] = $quantidade;
        }
    }
}

// IMPORTANTE: aqui não pode existir nenhum echo antes disso!
header("Location: carrinho.php");
exit;
