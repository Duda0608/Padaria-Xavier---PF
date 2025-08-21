<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE LISTAR CATEGORIA ===\n";
echo "<pre>";
print_r(listarcategoria($conexao));
echo "</pre>\n";
echo "oii";
?>