<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "bia";
$cpf = "254786752";
$telefone = "452587923";
$endereco = "128616";
$email = "lua@gmail";
$senha = "777";
$administrador = 1;
$controlelogin = 0;
$gerenciapromo = 0;

$idusuario = salvarusuario($conexao, $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo);
echo $idusuario;

?>