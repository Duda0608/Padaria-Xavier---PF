<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE DELETAR CATEGORIA ===\n";
$idcategoria = deletarcategoria($conexao, $idcategoria);
echo "Categoria deletada: " . ($idcategoria ? "Sucesso" : "Falha") . "\n\n";

?>