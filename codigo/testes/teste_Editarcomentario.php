<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE EDITAR COMENTARIO ===\n";


$idcomentario = 1;  
$comentario_edit = "Atendimento muito bom, recomendo!";

$resultado = editarcomentario($conexao, $comentario_edit, $idcomentario);

echo "Comentario editado: " . ($resultado ? "Sucesso" : "Falha") . "\n\n";
?>
