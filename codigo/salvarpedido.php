<?php
require_once "conexao.php";

$id = $_GET['id'];
$valor = $_POST['valor'];
$data = $_POST['data'];
$avaliacao = $_POST['avaliacao'];
$pagamento = $_POST['pagamento'];
$entrega = $_POST['entrega'];
$status = $_POST['status'];
$tb_cliente_idcliente = 2;

if ($id == 0) {
    $sql = "INSERT INTO tb_pedido (valor, `data`, avaliacao, pagamento, entrega, `status`, tb_cliente_idcliente) VALUES ('$valor', '$data', $avaliacao, $pagamento, $entrega, $status, $tb_cliente_idcliente)";
} else {
    $sql = "UPDATE tb_pedido SET valor = '$valor', `data` = '$data', avaliacao = $avaliacao, pagamento = $pagamento, entrega = $entrega, `status` = $status, tb_cliente_idcliente = $tb_cliente_idcliente WHERE idpedido = $id";
}
mysqli_query($conexao, $sql);

header("Location: home.php");
?>