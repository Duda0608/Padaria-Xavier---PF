<?php
require_once "../conexao.php";
require_once "../funcoes.php";

// Primeiro: verifica se o usuário existe, senão cria
$usuarioId = 1; // ID que deseja usar

$result = mysqli_query($conexao, "SELECT idusuario FROM tb_usuarios WHERE idusuario = $usuarioId");
if (mysqli_num_rows($result) == 0) {
    // Cria usuário de teste
    $nome = "Usuario Teste";
    $cpf = "12345678901";
    $telefone = "11999999999";
    $endereco = "Rua Teste, 123";
    $email = "teste@teste.com";
    $senha = password_hash("senha123", PASSWORD_DEFAULT);
    $administrador = 0;

    $sql = "INSERT INTO tb_usuarios (nome, cpf, telefone, endereco, email, senha, administrador) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi", $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador);
    mysqli_stmt_execute($stmt);
    $usuarioId = mysqli_insert_id($conexao);
    mysqli_stmt_close($stmt);

    echo "Usuário de teste criado com ID: $usuarioId\n";
} else {
    echo "Usuário já existe com ID: $usuarioId\n";
}

// Agora vamos salvar um pedido (status)
echo "=== TESTE SALVAR STATUS ===\n";

$valor = 35.5;
$data = "2025-08-28";  
$avaliacao = null;     
$pagamento = "Cartão";
$entrega = "Delivery";
$status = 0;

$idpedido = salvarstatus($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $usuarioId);

if ($idpedido) {
    echo "Pedido criado com ID: " . $idpedido . "\n";
} else {
    echo "Falha ao criar pedido\n";
}
?>
