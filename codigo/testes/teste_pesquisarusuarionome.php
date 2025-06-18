<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$nome = 'juju';

echo "<pre>";
print_r(pesquisarusuarionome($conexao, $nome));
echo "</pre>";
echo 'oiii';
?>