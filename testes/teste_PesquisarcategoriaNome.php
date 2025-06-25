<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE PESQUISAR CATEGORIA POR NOME ===\n";
$nome_busca = "Pães";

echo "<pre>";
print_r(pesquisarcategorianome($conexao, $nome_busca));
echo "</pre>\n"

?>