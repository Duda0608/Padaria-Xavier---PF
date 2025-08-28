<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE DELETAR PERMISSÕES ===\n";

$idadm = 11;

if (deletarpermissoes($conexao, $idadm)) {
    echo "Permissões do usuário $idadm removidas (administrador = 0)\n";
} else {
    echo "Erro ao remover permissões do usuário $idadm\n";
}
?>
