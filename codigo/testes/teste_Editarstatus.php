<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE EDITAR STATUS ===\n";

$idpedido = 1; // ID existente
$valor = 40.00;
$data = "2025-08-28";
$avaliacao = 5;
$pagamento = "Pix";
$entrega = "Balcão";
$status = 1;

$sucesso = editarstatus($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido);

echo $sucesso ? "Pedido $idpedido atualizado com sucesso.\n\n" : "Falha ao atualizar pedido.\n\n";
?>
