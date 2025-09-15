<?php
    require_once "conexao.php";
    require_once "funcoes.php";
    require_once "verificarlogado.php";

    $idpedido = $_GET['idpedido'];

    $pedido = pesquisarpedidonome($conexao, $idpedido);

    echo "<pre>";
    print_r($pedido);
    echo "</pre>";
    echo "oii";
?>
