<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE SALVAR CATEGORIA ===\n";
$nome = "Pães";
$descricao = "Categoria de pães diversos";

$idcategoria = salvarcategoria($conexao, $nome, $descricao);
echo "ID Categoria criada: " . $idcategoria . "\n\n";

?>