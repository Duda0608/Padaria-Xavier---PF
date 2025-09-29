<?php

require_once "conexao.php";
require_once "funcoes.php";

$produto = $_POST["produto"];
$datainicio = $_POST["datainicio"];
$datafinal = $_POST["datafinal"];
$valor = $_POST["valor"];

$id = $_GET['id'];

if ($produto != "") {
  salvarpromocao($conexao, $produto, $datainicio, $datafinal, $valor); 
} else {
  editarpromocao($conexao, $produto, $datainicio, $datafinal, $valor, $id);
}

header("listarpromocao.php");
?>