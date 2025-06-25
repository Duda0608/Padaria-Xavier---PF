<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE EDITAR CATEGORIA ===\n";
$nome_edit = "Doces";
$descricao_edit = "Categoria de doces variados";

$resultado_edit = editarcategoria($conexao, $nome_edit, $descricao_edit, $idcategoria);
echo "Categoria editada: " . ($resultado_edit ? "Sucesso" : "Falha") . "\n\n";


?>