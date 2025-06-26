<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE PESQUISAR HISTORICO POR NOME ===\n";
$nome_busca = "João Silva";

echo "<pre>";
print_r(pesquisarhistoriconome($conexao, $nome_busca));
echo "</pre>\n";

?>
