<?php

require_once "conexao.php";
require_once "funcoes.php";


$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$administrador = 0;
$controlelogin = 0;
$gerenciapromo = 0;

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$id = isset($_POST['idusuario']) ? $_POST['idusuario'] : 0;

if ($id == 0) {

    salvarusuario($conexao, $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo);
    header("Location: index.php");

} else {
    editarusuario($conexao, $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo, $idusu);
}


header("Location: home.php");
?>