<?php

require_once "conexao.php";
require_once "funcoes.php";

$produto = @$_POST["produto"];
$datainicio = @$_POST["datainicio"];
$datafinal = @$_POST["datafinal"];
$valor = @$_POST["valor"];

if ($produto != "") {
  salvarpromocao($conexao, $produto, $datainicio, $datafinal, $valor);
  echo "Promoção salva.";
}
?>