<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE EDITAR CATEGORIA ===\n";
$nome = "Doces";
$descricao = "Categoria de doces variados";

$idcategoria = editarcategoria($conexao, $nome, $descricao, $idcategoria);
echo "Categoria editada: " . ($idcategoria ? "Sucesso" : "Falha") . "\n\n";


?>