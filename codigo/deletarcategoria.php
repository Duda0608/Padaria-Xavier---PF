<?php
require_once "conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_categorias WHERE idcategoria = $id";

    mysqli_query($conexao, $sql);

    header("Location: listarcategoria.php");
    exit;
} else {
    echo "Não existe categoria.<br><br>";
    echo '<a href="formcategoria.php">Cadastrar Categoria</a>';
    exit;
}
?>