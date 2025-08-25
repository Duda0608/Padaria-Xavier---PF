<?php
require_once "conexao.php";
require_once "funcoes.php";

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];


$sql = "INSERT INTO tb_categorias (nome, descricao) VALUES ('$nome', '$descricao')";

mysqli_query($conexao, $sql);

header("Location: index.php");
?>