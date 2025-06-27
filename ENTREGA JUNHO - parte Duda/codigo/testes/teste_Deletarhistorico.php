<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE DELETAR HISTORICO ===\n";
$idhistorico = deletarhistorico($conexao, $idhistorico);
echo "Historico deletado: " . ($idhistorico ? "Sucesso" : "Falha") . "\n\n";

?>
