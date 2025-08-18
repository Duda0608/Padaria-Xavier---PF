<?php

require_once "../conexao.php";
require_once "../funcoes.php";

// $id = "1";
$valor = "1";
$data = "2000-09-05";
$avaliacao = "1";
$pagamento = "1";
$entrega = "1";
$status = "1";

// session_start();
// $id = $_SESSION['id'];
$id = 2;

$idpedido = salvarentrega($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $id);
echo "oii";
?>