<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];
$valor = $_POST['valor'];
$data = $_POST['data'];
$avaliacao = $_POST['avaliacao'];
$pagamento = $_POST['pagamento'];
$entrega = $_POST['entrega'];
$status = $_POST['status'];



session_start();
$tb_cliente_idcliente = 2;


if ($id == 0){
    salvarpedido($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status);
    header("Location: home.php");

} else {
    editarpedido($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $id);
    header("Location: listarpedido.php");
}
?>