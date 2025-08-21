<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE EDITAR CATEGORIA ===\n";
$idcategoria = "1";
$nome = "Doces";
$descricao = "Categoria de doces variados";


$idcategoria = editarcategoria($conexao, $nome, $descricao, $idcategoria);
echo "Categoria editada: " . ($idcategoria ? "Sucesso" : "Falha") . "\n\n";


?>