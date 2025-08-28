<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE EDITAR PERMISSÕES ===\n";

$idadm = 11;
$novo_status = 1; // 1 = administrador

if (editarpermissoes($conexao, $idadm, $novo_status)) {
    echo "Permissões do usuário $idadm atualizadas para: $novo_status\n";
} else {
    echo "Erro ao atualizar permissões do usuário $idadm\n";
}
?>
