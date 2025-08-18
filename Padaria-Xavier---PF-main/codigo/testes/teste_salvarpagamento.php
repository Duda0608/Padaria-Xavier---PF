<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$id = 2; // ID do cliente (já existente no banco)
$valor = 200.0;
$data = "2000-09-05";
$avaliacao = 5;
$pagamento = "Cartão";
$entrega = "Entrega Rápida";
$status = 1;

$idpedido = salvarpagamento($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $id);


echo "oii";
?>