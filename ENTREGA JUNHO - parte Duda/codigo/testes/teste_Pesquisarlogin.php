<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE PESQUISAR LOGIN ===\n";
$gmail = "teste@gmail.com";
$senha_busca = "123456";

echo "<pre>";
print_r(pesquisarlogin($conexao, $gmail, $senha_busca));
echo "</pre>\n";

?>