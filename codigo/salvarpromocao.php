<?php

require_once "conexao.php";
require_once "funcoes.php";

$datainicio = $_POST["datainicio"];
$datafinal = $_POST["datafinal"];
$valor = $_POST["valor"];
$tb_produtos_idprodutos = $_POST["tb_produtos_idprodutos"];

$id = $_GET['id'];

if ($id == 0) {
  salvarpromocao($conexao, $datainicio, $datafinal, $valor, $tb_produtos_idprodutos); 
} else {
  editarpromocao($conexao, $datainicio, $datafinal, $valor, $tb_produtos_idprodutos, $id);
}

header("listarpromocao.php");
?>  