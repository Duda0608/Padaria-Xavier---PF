<?php
require_once "../conexao.php";
require_once "../funcoes.php";


if (isset($_GET['idcategoria']) && !empty($_GET['idcategoria'])) {
    $idcategoria = $_GET['idcategoria'];
} else {
    echo "id não fornecido.";
    exit; 
}

echo "Categoria editada: Sucesso";
?>

