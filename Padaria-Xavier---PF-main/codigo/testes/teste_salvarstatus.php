<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$valor = "";
$data = "";
$avaliacao = "";
$pagamento = "";
$entrega = "";
$status = "";

salvarstatus($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status);
echo"oi";