<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE DELETAR PROMOCAO ===\n";
$idpromocao = deletarpromocao($conexao, $idpromocao);
echo "Promocao deletada: " . ($idpromocao ? "Sucesso" : "Falha") . "\n\n";

?>