<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "<pre>";
print_r(pesquisar_estoque_id($conexao));
echo "</pre>";

?>