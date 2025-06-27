<?php
    require_once "conexao.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM tb_produtos WHERE idprodutos = $id";

    mysqli_query($conexao, $sql);
?>