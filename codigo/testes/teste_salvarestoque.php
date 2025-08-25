require_once "../conexao.php";
require_once "../funcoes.php";

// Garantir que o produto existe e pegar seu ID
$idprodutos = garanteProdutoExistente($conexao);  // ou coloque um ID existente manualmente, tipo 1

// Dados do estoque
$nome = "pão francês tradicional";
$tipo = "pão";
$data = "2025-06-25";
$quantidade = 7;

// Salvar no estoque
$idestoque = salvarestoque($conexao, $nome, $tipo, $data, $quantidade, $idprodutos);
echo "ID do estoque inserido: " . $idestoque;
