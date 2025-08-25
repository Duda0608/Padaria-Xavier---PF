<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "=== TESTE SALVAR HISTORICO ===\n";
$nome = "João Silva";
$historico = "Pedido realizado com sucesso";

$idhistorico = salvarhistorico($conexao, $nome, $historico);

// Se $idhistorico é array, exibir com print_r ou foreach
if (is_array($idhistorico)) {
    echo "Resultado do histórico:\n";
    print_r($idhistorico);
} else {
    echo "ID Historico criado: " . $idhistorico . "\n";
}

?>
