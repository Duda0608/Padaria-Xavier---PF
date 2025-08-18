<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$idusuario = 3;

echo "<pre>";
print_r(pesquisarusuarioid($conexao, $idusuario));
echo "</pre>";;

?>