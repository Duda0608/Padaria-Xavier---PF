<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE SALVAR PROMOCAO ===\n";
$produto = "Pão Francês";
$datainicio = "2024-01-01";
$datafinal = "2024-01-31";
$valor = 2.50;

$idpromocao = salvarpromocao($conexao, $produto, $datainicio, $datafinal, $valor);
echo "ID Promocao criada: " . $idpromocao . "\n\n";

?>