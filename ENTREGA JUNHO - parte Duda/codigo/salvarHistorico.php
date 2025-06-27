<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$nome = $_POST["nome"];
$historico = $_POST["historico"];

salvarhistorico($conexao, $nome, $historico);

echo "Histórico salvo com sucesso.";
?>
