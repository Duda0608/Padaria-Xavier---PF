<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idusuario = 5;
$nome = "luna";
$cpf = "987654321";
$telefone = "111111111";
$endereco = "looooo";
$email = "luna@gmail";
$senha = "999";
$administrador = 0;
$controlelogin = 0;
$gerenciapromo = 0;

editarusuario($conexao, $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo, $idusuario);
echo 'funciono';
