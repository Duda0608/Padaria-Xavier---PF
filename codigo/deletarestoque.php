<?php
    require_once "conexao.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM tb_estoques WHERE idestoque = $id";

    mysqli_query($conexao, $sql);
?>