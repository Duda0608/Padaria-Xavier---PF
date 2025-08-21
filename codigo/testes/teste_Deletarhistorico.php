<?php
require_once "../conexao.php";
require_once "../funcoes.php";

if (isset($_GET['idhistorico']) && !empty($_GET['idhistorico'])) {
    $idhistorico = $_GET['idhistorico'];
} else {
    echo "id nao fornecido.";
    exit;
}

echo "Histórico deletado: Sucesso";
?>

?>
