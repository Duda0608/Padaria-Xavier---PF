<?php
require_once "verificarlogado.php";
require_once "funcoes.php";

if(isset($_GET['id'])) {
    require_once "conexao.php";
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

    $botao = "Finalizar Pedido";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio - Xavier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            background-color: rgba(0,0,0,0.4);
        }
        .categoria {
            font-weight: bold;
            color: #2E4A2B;
            margin-top: 30px;
            margin-bottom: 20px;
            text-transform: uppercase;
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
        .pedido-box {
            background-color: #f8f5f0;
            padding: 20px;
            border-radius: 8px;
            margin-top: 40px;
        }
        .btn-custom {
            background-color: #2E4A2B;
            color: #fff;
            border: none;
        }
        .btn-custom:hover {
            background-color: #c4a574;
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
        <li class="nav-item"><a class="nav-link" href="home.php">Pedidos</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="banner">
    <div>Cardápio<br><small style="font-size:1rem;">Confira nossos produtos</small></div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-md-3">
            <input type="text" class="form-control mb-3" placeholder="O que você procura?">
            <ul class="list-group">
                <li class="list-group-item">Todos os produtos</li>
                <li class="list-group-item active" style="background-color:#2E4A2B; border-color:#2E4A2B;">Pães</li>
                <li class="list-group-item">Sanduíches e salgados</li>
                <li class="list-group-item">Bolos</li>
                <li class="list-group-item">Café e bebidas</li>
                <li class="list-group-item">Doces finos</li>
                <li class="list-group-item">Promoções</li>
            </ul>
        </div>

        <div class="col-md-9">
            <h5 class="categoria">Pães</h5>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="produto-card">
                        <img src="img/pao1.jpg" alt="Pão Francês na Chapa Tradicional">
                        <div class="produto-nome">Pão Francês na Chapa Tradicional</div>
                        <div class="produto-preco">R$ 10,00</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="produto-card">
                        <img src="img/pao2.jpg" alt="Pão Francês com Requeijão Benjamin">
                        <div class="produto-nome">Pão Francês com Requeijão Benjamin</div>
                        <div class="produto-preco">R$ 16,00</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="produto-card">
                        <img src="img/pao3.jpg" alt="Pão de Queijo Tradicional Grande">
                        <div class="produto-nome">Pão de Queijo Tradicional Grande</div>
                        <div class="produto-preco">R$ 11,00</div>
                    </div>
                </div>
            </div>

            <div class="pedido-box mt-5">
                <h5 class="text-center mb-4">Finalizar Pedido</h5>
                <form action="salvarpedido.php?id=<?php echo $id; ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Endereço de Entrega</label>
                        <input type="text" class="form-control" name="entrega" value="<?php echo $entrega; ?>" placeholder="Rua, número, bairro, cidade">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Forma de Pagamento</label>
                        <select class="form-select" name="pagamento">
                            <option value="Cartão de Crédito" <?php if($pagamento=="Cartão de Crédito") echo "selected"; ?>>Cartão de Crédito</option>
                            <option value="Cartão de Débito" <?php if($pagamento=="Cartão de Débito") echo "selected"; ?>>Cartão de Débito</option>
                            <option value="Pix" <?php if($pagamento=="Pix") echo "selected"; ?>>Pix</option>
                            <option value="Dinheiro" <?php if($pagamento=="Dinheiro") echo "selected"; ?>>Dinheiro</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Data do Pedido</label>
                        <input type="date" class="form-control" name="data" value="<?php echo $data; ?>">
                    </div>
                    <div class="text-center mb-3">
                        <strong>Valor Total:</strong> R$ <span id="valorTotal"><?php echo $valor ? number_format($valor, 2, ',', '.') : '0,00'; ?></span>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-custom px-5 py-2"><?php echo $botao; ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

