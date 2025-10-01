<?php

require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];
$nome = $_POST['nome'];
$preco_venda = $_POST['preco_venda'];
$tbcategoria_idcategoria = $_POST['tbcategoria_idcategoria'];


if ($id == 0) {

    salvarprodutos($conexao, $nome, $preco_venda, $tbcategoria_idcategoria);
    header("Location: home.php");
    
} else {
    editarprodutos($conexao, $nome, $preco_venda, $tbcategoria_idcategoria, $id);
    header("Location: listarprodutos.php");
}


?>
