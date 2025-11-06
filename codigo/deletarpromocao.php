<?php
    require_once "conexao.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM tb_promocaos WHERE idpromocao = $id";

    mysqli_query($conexao, $sql);

    header("Location: listarpromocao.php");
?>