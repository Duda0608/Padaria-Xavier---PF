<?php
    require_once "conexao.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM tb_pedidos WHERE idpedido = $id";

    mysqli_query($conexao, $sql);
    
    header("Location: listarpedido.php");

?>