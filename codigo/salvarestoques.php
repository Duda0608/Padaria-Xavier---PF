<?php

require_once "conexao.php";
require_once "funcoes.php";


$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$data = $_POST['data'];
$quantidade = $_POST['quantidade'];
$tb_produtos_idprodutos = $_POST['tb_produtos_idprodutos'];

$sql = "INSERT INTO tb_estoques (nome, tipo, data, quantidade, tb_produtos_idprodutos) VALUES ('$nome', '$tipo', '$data', '$quantidade', '$tb_produtos_idprodutos')";

mysqli_query($conexao, $sql);

header("Location: home.php");
?>