<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE SALVAR USUÁRIO ===\n";

$nome = "Maria Teste";
$cpf = "12345678900";
$telefone = "11999999999";
$endereco = "Rua das Flores";
$email = "teste@gmail.com";
$senha = "123456";

$idusuario = salvarusuario($conexao, $nome, $cpf, $telefone, $endereco, $email, $senha);
echo "ID Usuário criado: " . $idusuario . "\n\n";
?>
