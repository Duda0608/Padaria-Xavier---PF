<?php
require_once "../funcoes.php";

$carrinho = array(
    array('nome' => 'Pão Francês', 'valor' => 1.50, 'data' => '2025-08-27', 'quantidade' => 5),
    array('nome' => 'Bolo de Chocolate', 'valor' => 20.00, 'data' => '2025-08-26', 'quantidade' => 1),
    array('nome' => 'Coxinha', 'valor' => 4.00, 'data' => '2025-08-27', 'quantidade' => 3)
);

echo "<h2>Meu Carrinho</h2>";
listarcarrinho($carrinho);
?>
