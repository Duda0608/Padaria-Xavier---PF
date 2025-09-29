<?php
require_once "conexao.php";

if (isset($_GET['idcategoria'])) {
    $id = $_GET['idcategoria'];

    $sql = "DELETE FROM tb_categorias WHERE idcategoria = $id";

    mysqli_query($conexao, $sql);

    header("Location: listarcategoria.php");
    exit;
} else {
    echo "idcategoria não fornecido.";
    exit;
}
?>
