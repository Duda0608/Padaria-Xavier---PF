<?php
require_once "../funcoes.php";

$carrinho = array(
    array('idprodutos' => 1, 'nome' => 'Pão Francês', 'quantidade' => 2),
    array('idprodutos' => 2, 'nome' => 'Bolo de Chocolate', 'quantidade' => 1),
    array('idprodutos' => 3, 'nome' => 'Coxinha', 'quantidade' => 3)
);

echo "<pre>";
echo "Antes de deletar:\n";
print_r($carrinho);

// Deleta o produto com id = 2
$carrinho = deletarcarrinho($carrinho, 2);

echo "\nDepois de deletar:\n";
print_r($carrinho);
echo "</pre>";
?>
