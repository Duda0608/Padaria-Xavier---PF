<?php
require_once "conexao.php";
require_once "funcoes.php";

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];

$idcategoria = salvarcategoria($conexao, $nome, $descricao);

if ($idcategoria) {
    echo "Categoria salva com sucesso. ID: " . $idcategoria;
} else {
    echo "Erro ao salvar categoria.";
}
?>
