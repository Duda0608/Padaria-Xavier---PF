<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE LISTAR STATUS ===\n";

$pedidos = listarstatus($conexao);

foreach ($pedidos as $pedido) {
    echo "ID: " . $pedido['idpedido'] . "\n";
    echo "Data: " . $pedido['data'] . "\n";
    echo "Valor: R$ " . number_format($pedido['valor'], 2, ',', '.') . "\n";
    echo "Pagamento: " . $pedido['pagamento'] . "\n";
    echo "Entrega: " . $pedido['entrega'] . "\n";
    echo "Status: " . $pedido['status'] . "\n";
    echo "Cliente ID: " . $pedido['tb_cliente_idcliente'] . "\n";
    echo "--------------------------\n";
}
?>
