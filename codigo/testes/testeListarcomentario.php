<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE LISTAR COMENTARIOS ===\n";
echo "<pre>";
print_r(listarcomentarios($conexao));
echo "</pre>\n";
?>
