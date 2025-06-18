<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$nome = 1;

echo "<pre>";
print_r(pesquisarusuarionome($conexao, $nome));
echo "</pre>";
echo 'oiii';
?>