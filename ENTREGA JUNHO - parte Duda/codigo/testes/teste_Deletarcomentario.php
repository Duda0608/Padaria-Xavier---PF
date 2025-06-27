<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE DELETAR COMENTARIO ===\n";
$idcomentario = deletarcomentario($conexao, $idcomentario);
echo "Comentario deletado: " . ($idcomentario ? "Sucesso" : "Falha") . "\n\n";

?>