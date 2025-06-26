<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE SALVAR HISTORICO ===\n";
$nome = "João Silva";
$historico = "Pedido realizado com sucesso";

$idhistorico = salvarhistorico($conexao, $nome, $historico);
echo "ID Historico criado: " . $idhistorico . "\n\n";

?>
