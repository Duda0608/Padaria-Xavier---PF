<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE LISTAR COMENTARIO ===\n";
echo "<pre>";
print_r(listarcomentarios($conexao));
echo "</pre>\n";
?>