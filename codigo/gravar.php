<?php
session_start();

echo "<h2>Resumo do Pedido</h2>";

if (empty($_SESSION['carrinho'])) {
    echo "Carrinho vazio";
    exit;
}

echo "<pre>";
print_r($_SESSION['carrinho']);
echo "</pre>";

echo "<br><a href='carrinho.php'>Voltar ao carrinho</a>";