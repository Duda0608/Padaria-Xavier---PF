<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE LISTAR PERMISSÕES ===\n";

$idadm = 11;

$permissao = listarpermissoes($conexao, $idadm);
if ($permissao !== null) {
    echo "Permissão do usuário $idadm: " . ($permissao == 1 ? "Administrador/Funcionário" : "Cliente") . "\n";
} else {
    echo "Usuário $idadm não encontrado.\n";
}
?>
