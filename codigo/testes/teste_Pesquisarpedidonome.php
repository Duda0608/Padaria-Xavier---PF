<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$usuario = "João Silva";

echo "<pre>";
print_r(pesquisarpedidonome($conexao, $usuario));
echo "</pre>";
?>
