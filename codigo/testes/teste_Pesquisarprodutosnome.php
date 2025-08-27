<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "Produto Novo"; 

echo "<pre>";
print_r(pesquisarprodutosnome($conexao, $nome));
echo "</pre>";
echo "oii";
?>
