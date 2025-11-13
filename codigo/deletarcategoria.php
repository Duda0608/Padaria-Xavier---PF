<?php
require_once "conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Deleta todos os produtos da categoria
    $sql_produtos = "DELETE FROM tb_produtos WHERE tbcategoria_idcategoria = $id";
    mysqli_query($conexao, $sql_produtos);

    // Agora deleta a categoria
    $sql_categoria = "DELETE FROM tb_categorias WHERE idcategoria = $id";
    mysqli_query($conexao, $sql_categoria);

    header("Location: listarcategoria.php");
    exit;
} else {
    echo "Não existe categoria.<br><br>";
    echo '<a href="formcategoria.php">Cadastrar Categoria</a>';
    exit;
}


?>