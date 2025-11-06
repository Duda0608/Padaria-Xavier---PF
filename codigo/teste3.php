<?php
require_once "verificarlogado.php";
require_once "funcoes.php";
require_once "conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_pedidos WHERE idpedido = $id";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);

    $valor = $linha['valor'];
    $data = $linha['data'];
    $pagamento = $linha['pagamento'];
    $entrega = $linha['entrega'];
    $botao = "Atualizar Pedido";
} else {
    $id = 0;
    $valor = "";
    $data = "";
    $pagamento = "";
    $entrega = "";
    $botao = "Cadastrar Pedido";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio - Xavier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
            font-family: 'Inter', sans-serif;
        }
        .navbar {
            background-color: #2E4A2B;
        }
        .navbar-brand {
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
        }
        .navbar-brand span {
            color: #c4a574;
        }
        .nav-link {
            color: #fff !important;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }
        .banner {
            background-image: url('img/banner-cafe.jpg');
            background-size: cover;
            background-position: center;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .categoria {
            font-weight: bold;
            color: #2E4A2B;
            margin-top: 30px;
            margin-bottom: 20px;
            text-transform: uppercase;
            text-align: center;
        }
        .produto-card {
            border: none;
            text-align: center;
            background-color: #fff;
        }
        .produto-card img {
            width: 100%;
            border-radius: 4px;
        }
        .produto-nome {
            font-weight: 600;
            margin-top: 10px;
            text-transform: uppercase;
            font-size: 0.9rem;
        }
        .produto-preco {
            color: #2E4A2B;
            font-weight: bold;
        }
        .btn-custom {
            background-color: #2E4A2B;
            color: #fff;
            border: none;
        }
        .btn-custom:hover {
            background-color: #c4a574;
        }
        .pedido-box {
            background-color: #f8f5f0;
            padding: 20px;
            border-radius: 8px;
            margin-top: 40px;
        }
        .form-label {
            color: #2E4A2B;
            font-weight: 600;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">xavier<span>*</span></a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Página Inicial</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Cardápio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Promoção</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Pedidos</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="banner">
    <div>Cardápio<br><small style="font-size:1rem;">Confira nossos produtos</small></div>
</div>

<div class="container my-5">
    <h5 class="categoria">Todos os Produtos</h5>
    <form action="adicionar.php" method="post">
        <div class="row g-4">
            <?php
            $lista_produtos = listarprodutos($conexao);
            foreach ($lista_produtos as $listarprodutos):
            ?>
            <div class="col-md-3">
                <div class="produto-card">
                    <img src="img/<?php echo $listarprodutos['imagem']; ?>" alt="<?php echo $listarprodutos['nome_produto']; ?>">
                    <div class="produto-nome"><?php echo $listarprodutos['nome_produto']; ?></div>
                    <div class="produto-preco">R$ <?php echo number_format($listarprodutos['preco_venda'], 2, ',', '.'); ?></div>
                    <div class="mt-2">
                        <input type="checkbox" name="idprodutos[]" value="<?php echo $listarprodutos['idprodutos']; ?>">
                        <input type="number" name="quantidade[<?php echo $listarprodutos['idprodutos']; ?>]" value="1" min="1" class="form-control mt-1" style="width:80px; margin:auto;">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-custom px-5 py-2">Adicionar Selecionados ao Carrinho</button>
        </div>
    </form>

    <div class="pedido-box mt-5">
        <h5 class="text-center mb-4">Finalizar Pedido</h5>
        <form action="salvarpedido.php?id=<?php echo $id; ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Valor Total</label>
                <input type="text" class="form-control" name="valor" value="<?php echo $valor; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Data</label>
                <input type="date" class="form-control" name="data" value="<?php echo $data; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Forma de Pagamento</label>
                <input type="text" class="form-control" name="pagamento" value="<?php echo $pagamento; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Local de Entrega</label>
                <input type="text" class="form-control" name="entrega" value="<?php echo $entrega; ?>">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-custom px-5 py-2"><?php echo $botao; ?></button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

