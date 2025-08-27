<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$idprodutos = 3; // ID do produto que você quer editar
$nome = "Produto Novo";
$tipo = "Panificação";
$preco_venda = 2.00;

editarprodutos($conexao, $nome, $tipo, $preco_venda, $idprodutos);

echo "Produto atualizado com sucesso!";
?>
