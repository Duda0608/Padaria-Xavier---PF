<?php
    require_once "conexao.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM tb_usuarios WHERE idusuario = $id";

    mysqli_query($conexao, $sql);
    
     header("Location: listarusuarios.php");
?>