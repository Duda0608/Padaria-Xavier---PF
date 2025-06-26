<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE DELETAR CATEGORIA ===\n";
$resultado_delete = deletarcategoria($conexao, $idcategoria);
echo "Categoria deletada: " . ($resultado_delete ? "Sucesso" : "Falha") . "\n\n";

?>