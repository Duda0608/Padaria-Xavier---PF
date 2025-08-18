<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$valor = "1";
$data = "2024-09-01";
$avaliacao = "1";
$pagamento = "1";
$entrega = "1";
$status = "1";

editarstatus($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idestoqu);
echo"oi";