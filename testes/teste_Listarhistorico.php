<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE LISTAR HISTORICO ===\n";
echo "<pre>";
print_r(listarhistorico($conexao));
echo "</pre>\n";

?>
