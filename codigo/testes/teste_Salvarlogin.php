<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE SALVAR LOGIN ===\n";
$email = "teste@gmail.com";
$senha = "123456";

$idlogin = salvarlogin($conexao, $email, $senha);
echo "ID Login criado: " . $idlogin . "\n\n";

?>