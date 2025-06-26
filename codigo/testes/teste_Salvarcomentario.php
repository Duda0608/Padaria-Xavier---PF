<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE SALVAR COMENTARIO ===\n";
$nome = "Ana Costa";
$comentario = "Excelente atendimento!";

$idcomentario = salvarcomentario($conexao, $nome, $comentario);
echo "ID Comentario criado: " . $idcomentario . "\n\n";

?>