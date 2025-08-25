<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE SALVAR COMENTARIO ===\n";

$nome = "Ana Costa";  // Esse nome precisa existir na tabela tb_usuarios
$comentario = "Excelente atendimento!";

// Chama a função para salvar o comentário
$idcomentario = salvarcomentario($conexao, $nome, $comentario);

// Exibe o ID do comentário inserido
echo "ID Comentário criado: " . $idcomentario . "\n\n";
?>
