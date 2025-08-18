<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$valor = "1";
$data = "2099-10-01";
$avaliacao = "0";
$pagamento = "0";
$entrega = "0";
$status = "0";
$idpedido = "19";

editarpedido($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido);
echo "oiiii";