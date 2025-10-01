<?php

require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$preco_venda = $_POST['preco_venda'];
$tbcategoria_idcategoria = 1;


if ($id == 0) {

    salvarprodutos($conexao, $nome, $tipo, $preco_venda, $tbcategoria_idcategoria);
    header("Location: home.php");
    
} else {
    editarprodutos($conexao, $nome, $tipo, $preco_venda, $tbcategoria_idcategoria);
    header("Location: listarprodutos.php");
}


?>
