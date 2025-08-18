<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$idpedido = 20;

echo "<pre>";
print_r(pesquisarpedidoid($conexao, $idpedido));
echo "</pre>";;

?>