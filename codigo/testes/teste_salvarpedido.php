<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$id = "1";
$valor = "10";
$data = "2000-09-05";
$avaliacao = "1";
$pagamento = "1";
$entrega = "1";
$status = "1";
$tb_cliente_idcliente = "1";

$idpedido = salvarpedido($conexao, $id, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $tb_cliente_idcliente);
echo $idpedido;
echo "oii";
?>