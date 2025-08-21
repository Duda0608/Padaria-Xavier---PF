<?php
require_once "../conexao.php";
require_once "../funcoes.php";

if (isset($_GET['idestoque'])) {
    $idestoque = $_GET['idestoque'];
} else {
    echo "id não encontrado.";
    exit;
}

echo "Sucesso";
?>