<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE DELETAR COMENTARIO ===\n";
$resultado_delete = deletarcomentario($conexao, $idcomentario);
echo "Comentario deletado: " . ($resultado_delete ? "Sucesso" : "Falha") . "\n\n";

?>