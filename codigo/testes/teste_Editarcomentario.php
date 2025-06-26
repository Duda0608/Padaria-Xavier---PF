<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE EDITAR COMENTARIO ===\n";
$comentario_edit = "Atendimento muito bom, recomendo!";

$resultado_edit = editarcomentario($conexao, $comentario_edit, $idcomentario);
echo "Comentario editado: " . ($resultado_edit ? "Sucesso" : "Falha") . "\n\n";

?>