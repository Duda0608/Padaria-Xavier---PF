<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "juju";
$cpf = "344566743";
$telefone = "56070353";
$endereco = "jgigh";
$email = "juju@gmail";
$senha = "000";
$admnistrador = 0;
$controlelogin = 0;
$gerenciapromo = 0;

$idusuario = salvarusuario($conexao, $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo);
echo $idusuario;

?>