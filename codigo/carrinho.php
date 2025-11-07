<?php
// Não inicia a sessão aqui, porque o verificarlogado já faz isso.
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";

// Garante que a variável carrinho exista
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carrinho</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
    crossorigin="anonymous">
<link rel="stylesheet" href="estilo.css">
</head>

<body class="container my-5">
<h1>Carrinho</h1>
<hr>

<?php
if (count($_SESSION['carrinho']) == 0) {
    echo "<p>Carrinho vazio</p>";
} else {
    $total = 0;
    echo "<table class='table table-striped-columns'>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>Preço</th>";
    echo "<th>Quantidade</th>";
    echo "<th>Total unitário</th>";
    echo "<th>Remover</th>";
    echo "</tr>";

    foreach ($_SESSION['carrinho'] as $id => $quantidade) {
        $produto = pesquisarprodutosid($conexao, $id);
        echo "<tr>";
        echo "<td>".$produto['nome']."</td>";
        echo "<td>R$ ".$produto['preco_venda']."</td>";
        echo "<td>".$quantidade."</td>";
        $total_unitario = $produto['preco_venda'] * $quantidade;
        $total = $total + $total_unitario;
        echo "<td>R$ ".$total_unitario."</td>";
        echo "<td><a href='remover.php?id=".$id."' class='btn btn-danger btn-sm'>Remover</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<h3>Total da compra: R$ ".$total."</h3>";
    echo "<a href='finalizar_venda.php' class='btn btn-success mt-3'>Finalizar pedido</a>";
}
?>

<br><br>
<a href="home.php" class="btn btn-secondary">Voltar</a>

</body>
</html>