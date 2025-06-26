<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE PESQUISAR CATEGORIA POR ID ===\n";
$nome_busca = "Pães";
$idcategoria_busca = $idcategoria;

echo "<pre>";
print_r(pesquisarcategoriaid($conexao, $nome_busca, $idcategoria_busca));
echo "</pre>\n";

?>