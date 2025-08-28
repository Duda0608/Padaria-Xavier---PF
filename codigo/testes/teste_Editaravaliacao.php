<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE EDITAR AVALIAÇÃO ===\n";

$valor = 30.0;
$data = "2025-08-28";
$avaliacao = 5;
$pagamento = "Cartão";
$entrega = "Delivery";
$status = 1;
$idpedido = 1; // Altere para um ID válido da tabela tb_pedidos

$result = editaravaliacao($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido);

if ($result) {
    echo "Pedido com ID $idpedido atualizado com sucesso.\n\n";
} else {
    echo "Erro ao atualizar pedido com ID $idpedido.\n\n";
}
?>
