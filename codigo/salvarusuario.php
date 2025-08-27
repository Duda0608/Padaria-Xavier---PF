<?php

require_once "conexao.php";
require_once "funcoes.php";


$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$controlelogin = 0;
$gerenciapromo = 0;

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

if ($id == 0) {

    salvarusuario($conexao, $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo);

} else {
    $sql = "INSERT INTO tb_usuarios (nome, cpf, telefone, endereco, email, senha, controlelogin, gerenciapromo) VALUES ('$nome', '$cpf', '$telefone', '$endereco', '$email', '$senha_hash', '$controlelogin', '$gerenciapromo')";

}

mysqli_query($conexao, $sql);

header("Location: index.php");
?>