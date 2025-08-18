<?php
require_once "conexao.php";
require_once "funcoes.php";

$comentario = $_POST['comentario'];
$idusuario = (int)$_POST['idusuario'];

$idcomentario = salvarcomentario($conexao, $comentario, $idusuario);

if ($idcomentario) {
    echo "Comentário salvo com sucesso. ID: " . $idcomentario;
} else {
    echo "Erro ao salvar comentário.";
}
?>
