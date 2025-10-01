<?php
require_once "conexao.php";
require_once "funcoes.php";

session_start(); // Inicia a sessão para pegar o id do cliente, se estiver usando

// Pega os dados que vieram do formulário
$id = $_GET['id'];
$valor = $_POST['valor'];
$data = $_POST['data'];
$pagamento = $_POST['pagamento'];
$entrega = $_POST['entrega'];

// Aqui define o cliente do pedido (está como fixo)
$tb_cliente_idcliente = 2; // Pode usar $_SESSION['idusuario'] se estiver usando login

// Verifica se é cadastro novo ou edição
if ($id == 0){
    // Cadastrar novo pedido
    salvarpedido($conexao, $valor, $data, $pagamento, $entrega, $tb_cliente_idcliente);
    header("Location: home.php"); // Volta pra home depois de cadastrar
    exit;
} else {
    // Editar pedido existente
    editarpedido($conexao, $valor, $data, $pagamento, $entrega, $id);
    header("Location: listarpedido.php"); // Volta pra lista depois de editar
    exit;
}
?>
