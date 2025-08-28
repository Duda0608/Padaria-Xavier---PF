<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE SALVAR AVALIAÇÃO ===\n";

$valor = 25.00;
$data = "2025-08-28";   // Data no formato correto YYYY-MM-DD, em string
$avaliacao = 4;
$pagamento = "Dinheiro";
$entrega = "Retirada";
$status = 1;
$idcliente = 11;        // Certifique-se que este cliente existe na tabela tb_usuarios

$idpedido = salvaravaliacao($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idcliente);

if ($idpedido) {
    echo "Pedido salvo com sucesso! ID: " . $idpedido . "\n";
} else {
    echo "Erro ao salvar pedido.\n";
}
?>
