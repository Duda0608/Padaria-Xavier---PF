<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE DELETAR HISTORICO ===\n";
$resultado_delete = deletarhistorico($conexao, $idhistorico);
echo "Historico deletado: " . ($resultado_delete ? "Sucesso" : "Falha") . "\n\n";

?>
