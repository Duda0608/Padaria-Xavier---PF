<?php
require_once "../conexao.php";
require_once "../funcoes.php";

// Dados do pedido
$valor = 100.50;
$data = "2025-08-25";
$avaliacao = 5;
$pagamento = "Cartão";
$entrega = "Correios";
$status = 1;

$idusuario = 1;

// Verifica se o usuário existe
$sql = "SELECT idusuario FROM tb_usuarios WHERE idusuario = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, 'i', $idusuario);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) == 0){
    mysqli_stmt_close($stmt);

    // Usuário não existe, cria um usuário novo
    $nome = "Usuário Teste";
    $cpf = "12345678900";
    $telefone = "99999999999";
    $endereco = "Rua Teste, 123";
    $email = "teste@email.com";
    $senha = password_hash("123456", PASSWORD_DEFAULT);
    $administrador = 0;
    $controlelogin = null;
    $gerenciapromo = null;

    $sqlInsert = "INSERT INTO tb_usuarios (nome, cpf, telefone, endereco, email, senha, administrador, controlelogin, gerenciapromo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtInsert = mysqli_prepare($conexao, $sqlInsert);
    mysqli_stmt_bind_param($stmtInsert, 'ssssssiii', $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo);

    if(mysqli_stmt_execute($stmtInsert)){
        $idusuario = mysqli_insert_id($conexao);
        echo "Usuário criado com ID: $idusuario <br>";
    } else {
        die("Erro ao criar usuário: " . mysqli_error($conexao));
    }
    mysqli_stmt_close($stmtInsert);
} else {
    mysqli_stmt_close($stmt);
    echo "Usuário $idusuario encontrado. <br>";
}

// Agora salva o pedido
$idpedido = salvarpedido($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idusuario);

if($idpedido){
    echo "Pedido salvo com sucesso! ID do pedido: $idpedido";
} else {
    echo "Erro ao salvar pedido.";
}
?>
