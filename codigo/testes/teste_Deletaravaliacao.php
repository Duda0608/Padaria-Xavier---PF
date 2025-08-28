<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE DELETAR AVALIAÇÃO ===\n";

$idpedido_deletar = 1; // Altere para um ID válido da tabela tb_pedidos

$result = deletaravaliacao($conexao, $idpedido_deletar);

if ($result) {
    echo "Pedido com ID $idpedido_deletar deletado com sucesso.\n\n";
} else {
    echo "Erro ao deletar pedido com ID $idpedido_deletar.\n\n";
}
?>
