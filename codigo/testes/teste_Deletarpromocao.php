<?php
require_once "../conexao.php";
require_once "../funcoes.php";


//empty que verifica se uma variável está vazia
if (isset($_GET['idpromocao']) && !empty($_GET['idpromocao'])) {
    $idpromocao = $_GET['idpromocao'];
} else {
    echo "id não fornecido.";
    exit; 
}

echo "Promoção deletada: Sucesso";
?>

