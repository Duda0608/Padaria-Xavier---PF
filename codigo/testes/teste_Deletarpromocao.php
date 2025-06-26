<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE DELETAR PROMOCAO ===\n";
$resultado_delete = deletarpromocao($conexao, $idpromocao);
echo "Promocao deletada: " . ($resultado_delete ? "Sucesso" : "Falha") . "\n\n";

?>