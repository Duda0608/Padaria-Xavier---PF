<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE LISTAR LOGIN ===\n";
echo "<pre>";
print_r(listarusuario($conexao));
echo "</pre>\n";

?>