<?php

require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$preco_venda = $_POST['preco_venda'];
$tb_promocao_idpromocao = 1;
$tbcategoria_idcategoria = 1;


if ($id == 0) {
    // $sql = "INSERT INTO tb_pedidos (valor, `data`, avaliacao, pagamento, entrega, `status`, `tb_cliente_idcliente`) VALUES ($valor, `$data`, $avaliacao, `$pagamento`, $entrega, $status, `$tb_cliente_idcliente`)";

    // chamar a função salvarpedido com os valores das variáveis...
    salvarprodutos($conexao, $nome, $tipo, $preco_venda, $tb_promocao_idpromocao, $tbcategoria_idcategoria);

} else {
    editarprodutos($conexao, $nome, $tipo, $preco_venda, $tb_promocao_idpromocao, $tbcategoria_idcategoria);
}
// mysqli_query($conexao, $sql);


header("Location: home.php");
?>
