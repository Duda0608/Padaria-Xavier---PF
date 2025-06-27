<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE LISTAR PROMOCAO ===\n";
echo "<pre>";
print_r(listarpromocao($conexao));
echo "</pre>\n";

?>