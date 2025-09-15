<?php
    require_once "conexao.php";

    $id = $_GET['idcategoria'];

    $sql = "DELETE FROM tb_categorias WHERE idcategoria = $id";

    mysqli_query($conexao, $sql);

    header("Location: listarcategoria.php");
?>