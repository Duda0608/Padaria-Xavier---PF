<?php

require_once "conexao.php";
require_once "funcoes.php";

$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$preco_venda = $_POST['preco_venda'];
$lucro = $_POST['lucro'];
$tb_promocao_idpromocao = 0;
$tbcategoria_idcategoria = 0;

$sql = "INSERT INTO tb_produtos(nome, tipo, preco_venda, lucro, tb_promocao_idpromocao, tbcategoria_idcategoria) VALUES ('$nome', '$tipo', '$preco_venda', '$lucro', '$tb_promocao_idpromocao', '$tbcategoria_idcategoria')";

mysqli_query($conexao, $sql);

header("Location: home.php");
?>
