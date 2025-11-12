<?php
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";

if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0) {
    header("Location: carrinho.php");
    exit;
}

$total = 0;
foreach ($_SESSION['carrinho'] as $id => $quantidade) {
    $produto = pesquisarprodutosid($conexao, $id);
    $total += $produto['preco_venda'] * $quantidade;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Venda - Panificadora Xavier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
</head>

<body class="body-finalizar">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-finalizar">
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
                    <li class="nav-item"><a class="nav-link text-white" href="carrinho.php">Carrinho</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Espaço para compensar a navbar fixa -->
    <div style="height: 90px;"></div>

    <div class="container my-5">
        <div class="card card-finalizar shadow-lg border-0">
            <div class="card-body p-4">
                <h2 class="titulo-finalizar mb-4">Finalizar Pedido</h2>
                <hr>

                <p class="mb-4 texto-finalizar">Confira as informações abaixo e escolha a forma de pagamento para concluir sua compra.</p>

                <div class="resumo-pedido mb-4">
                    <h5 class="fw-bold">Resumo do Pedido</h5>
                    <ul class="list-group list-group-flush">
                        <?php
                        foreach ($_SESSION['carrinho'] as $id => $quantidade) {
                            $produto = pesquisarprodutosid($conexao, $id);
                            $subtotal = $produto['preco_venda'] * $quantidade;
                            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                            echo htmlspecialchars($produto['nome']) . " (x$quantidade)";
                            echo "<span>R$ " . number_format($subtotal, 2, ',', '.') . "</span>";
                            echo "</li>";
                        }
                        ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            Total
                            <span>R$ <?= number_format($total, 2, ',', '.') ?></span>
                        </li>
                    </ul>
                </div>

                <form action="processar_venda.php" method="POST">
                    <div class="mb-3">
                        <label for="pagamento" class="form-label fw-semibold">Forma de Pagamento</label>
                        <select name="pagamento" id="pagamento" class="form-select" required>
                            <option value="">Selecione...</option>
                            <option value="Cartão de Crédito">Cartão de Crédito</option>
                            <option value="Cartão de Débito">Cartão de Débito</option>
                            <option value="Pix">Pix</option>
                            <option value="Dinheiro">Dinheiro</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="endereco" class="form-label fw-semibold">Endereço de Entrega</label>
                        <input type="text" name="endereco" id="endereco" class="form-control" required placeholder="Digite seu endereço">
                        </select>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="carrinho.php" class="btn btn-voltar">Voltar ao Carrinho</a>
                        <button type="submit" class="btn btn-finalizar">Confirmar Pedido</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>