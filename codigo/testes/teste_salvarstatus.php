<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$valor = "";
$data = "";
$avaliacao = "";
$pagamento = "";
$entrega = "";
$status = "";

salvar_status($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status);