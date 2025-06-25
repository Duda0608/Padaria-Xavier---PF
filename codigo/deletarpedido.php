<?php
    require_once "conexao.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM tb_pedido WHERE idpedido = $id";

    mysqli_query($conexao, $sql);
?>