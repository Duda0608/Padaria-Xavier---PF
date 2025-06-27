<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$id = "1";
$nome = "pi";
$tipo = "sal";
$data = "2099-10-01";
$quantidade = "9";
$tb_produtos_idprodutos = 1;

salvarestoque ($conexao, $nome, $tipo, $data, $quantidade, $tb_produtos_idprodutos);
echo "oiiii";