<?php
require_once "conexao.php";
require_once "funcoes.php";


$descricao = $_POST['descricao'];
$nome = $_POST['nome'];


$id = $_GET['id'];


if ($id == 0) {
    salvarcategoria($conexao, $nome, $descricao);

} else {
    editarcategoria($conexao, $nome, $descricao, $id);

}

 header("Location: listarcategoria.php");
 ?>