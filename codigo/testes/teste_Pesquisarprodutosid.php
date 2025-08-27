<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$idprodutos = 1; 

echo "<pre>";
print_r(pesquisarprodutosid($conexao, $idprodutos));
echo "</pre>";
echo "oii"
?>
