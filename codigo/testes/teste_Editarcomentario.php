<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE EDITAR COMENTARIO ===\n";
$comentario_edit = "Atendimento muito bom, recomendo!";

$idcomentario = editarcomentario($conexao, $comentario_edit, $idcomentario);
echo "Comentario editado: " . ($idcomentario ? "Sucesso" : "Falha") . "\n\n";

?>