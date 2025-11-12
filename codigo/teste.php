<?php
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Carrinho - Panificadora Xavier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
</head>

<body style="background-color: #1f3a2e; font-family: 'Inter', sans-serif;">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #1f3a2e;">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="home.php">xavier<span>✦</span></a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link text-white" href="home.php">Página Inicial</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="formpedido.php">Cardápio</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="formpromocao.php">Promoção</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="carrinho.php">Pedidos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Espaço para compensar a navbar fixa -->
    <div style="height: 90px;"></div>

    <div class="container my-5">
        <div class="card shadow-lg border-0" style="background-color: #f5f5f0; border-radius: 16px;">
            <div class="card-body p-4">
                <h2 class="mb-4" style="color: #1f3a2e; font-family: 'Playfair Display', serif;">Seu Carrinho</h2>
                <hr>

                <?php
                if (count($_SESSION['carrinho']) == 0) {
                    echo "<p class='text-center text-muted'>Seu carrinho está vazio.</p>";
                } else {
                    $total = 0;
                    echo "<div class='table-responsive'>";
                    echo "<table class='table align-middle'>";
                    echo "<thead class='table-light'>";
                    echo "<tr>";
                    echo "<th>Produto</th>";
                    echo "<th>Preço</th>";
                    echo "<th>Quantidade</th>";
                    echo "<th>Total</th>";
                    echo "<th>Ação</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    foreach ($_SESSION['carrinho'] as $id => $quantidade) {
                        $produto = pesquisarprodutosid($conexao, $id);
                        $total_unitario = $produto['preco_venda'] * $quantidade;
                        $total += $total_unitario;

                        echo "<tr>";
                        echo "<td class='fw-semibold'>" . htmlspecialchars($produto['nome']) . "</td>";
                        echo "<td>R$ " . number_format($produto['preco_venda'], 2, ',', '.') . "</td>";
                        echo "<td>" . $quantidade . "</td>";
                        echo "<td>R$ " . number_format($total_unitario, 2, ',', '.') . "</td>";
                        echo "<td><a href='remover.php?id=" . $id . "' class='btn btn-sm btn-outline-danger'>Remover</a></td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";

                    echo "<div class='d-flex justify-content-between align-items-center mt-4'>";
                    echo "<h4 class='fw-bold' style='color: #1f3a2e;'>Total da compra: R$ " . number_format($total, 2, ',', '.') . "</h4>";
                    echo "</div>";

                    echo "<div class='d-flex justify-content-between mt-4'>";
                    echo "<a href='formpedido.php' class='btn btn-outline-secondary px-4 py-2'>Continuar Adicionando</a>";
                    echo "<a href='finalizar_venda.php' class='btn btn-success px-4 py-2'>Prosseguir com o Pagamento</a>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>