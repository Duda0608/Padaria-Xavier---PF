<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idusuario = 2;
$nome = "anaaaaa";
$cpf = "111111111111";
$telefone = "000000000";
$endereco = "kloideeee";
$email = "juliaaaa@gmail";
$senha = "999";
$administrador = 0;
$controlelogin = 0;
$gerenciapromo = 0;

editarusuario($conexao, $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo);
echo 'offdi';
