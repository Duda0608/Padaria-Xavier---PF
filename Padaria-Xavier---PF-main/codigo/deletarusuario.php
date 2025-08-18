<?php
    require_once "conexao.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM tb_usuario WHERE idusuario = $id";

    mysqli_query($conexao, $sql);
?>