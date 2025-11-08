<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if ($_POST) {
    $selecionados = $_POST['idprodutos'];

    if (!empty($selecionados)) {
        foreach ($selecionados as $id) {

            $quantidade = intval($_POST['quantidade'][$id]);

            if ($quantidade < 1) {
                continue;
            }

            if (isset($_SESSION['carrinho'][$id])) {
                $_SESSION['carrinho'][$id] += $quantidade;
            } else {
                $_SESSION['carrinho'][$id] = $quantidade;
            }
        }
    }
}

header("Location: carrinho.php");
exit;
