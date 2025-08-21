<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE EDITAR PROMOCAO ===\n";

$produto = "Pão Doce";
$datainicio = "2024-02-01";
$datafinal = "2024-02-28";
$valor = 3.00;

$idpromocao = 1;  // ID válido da promoção a ser editada

$resultado = editarpromocao($conexao, $produto, $datainicio, $datafinal, $valor, $idpromocao);

echo "Promocao editada: " . ($resultado ? "Sucesso" : "Falha") . "\n\n";
?>
