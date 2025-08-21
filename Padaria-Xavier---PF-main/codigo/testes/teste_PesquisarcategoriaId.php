<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE PESQUISAR CATEGORIA POR ID ===\n";
$nome_Busca = "Pães";
$idcategoria_Busca = "1";

echo "<pre>";
print_r(pesquisarcategoriaid($conexao, $nome_Busca, $idcategoria_Busca));
echo "</pre>\n";

?>