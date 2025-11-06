<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho - </title>
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
        .container {
            margin-top: 50px;
        }
        h2 {
            color: #2E4A2B;
            font-family: 'Playfair Display', serif;
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            background-color: #f8f5f0;
            border-radius: 8px;
            overflow: hidden;
        }
        th {
            background-color: #2E4A2B;
            color: #fff;
            text-align: center;
        }
        td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-custom {
            background-color: #2E4A2B;
            color: #fff;
            border: none;
        }
        .btn-custom:hover {
            background-color: #c4a574;
        }
        .total-box {
            background-color: #f8f5f0;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-top: 20px;
        }
        .total-box h3 {
            color: #2E4A2B;
        }
        .acoes {
            text-align: center;
            margin-top: 30px;
        }
        .acoes a {
            text-decoration: none;
            color: #fff;
            background-color: #2E4A2B;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 5px;
            display: inline-block;
        }
        .acoes a:hover {
            background-color: #c4a574;
        }
        #mensagemFinal {
            display: none;
            background-color: #e8dcc0;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            color: #2E4A2B;
            font-weight: bold;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">xavier<span>*</span></a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="formpedido.php">Cardápio</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Promoção</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Pedidos</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <h2>Seu Carrinho</h2>

    <?php
    if (empty($_SESSION['carrinho'])) {
        echo "<div class='alert alert-warning text-center'>Carrinho vazio</div>";
    } else {
        $total = 0;
        echo "<table class='table table-bordered align-middle'>";
        echo "<thead><tr><th>Produto</th><th>Preço</th><th>Quantidade</th><th>Total</th><th>Ação</th></tr></thead><tbody>";

        foreach ($_SESSION['carrinho'] as $idproduto => $quantidade) {
            $sql = "SELECT * FROM tb_produtos WHERE idprodutos = $idproduto";
            $res = mysqli_query($conexao, $sql);
            $produto = mysqli_fetch_array($res);

            if ($produto == null) continue;

            $nome = $produto['nome'];
            $preco = $produto['preco_venda'];
            $total_item = $preco * $quantidade;
            $total += $total_item;

            echo "<tr>";
            echo "<td>$nome</td>";
            echo "<td>R$ " . number_format($preco, 2, ',', '.') . "</td>";
            echo "<td>
                    <form action='atualiza_carrinho.php' method='post' class='d-flex justify-content-center align-items-center gap-2'>
                        <input type='hidden' name='id' value='$idproduto'>
                        <input type='number' name='quantidade' value='$quantidade' min='1' class='form-control' style='width:80px;'>
                        <input type='submit' value='Atualizar' class='btn btn-custom btn-sm'>
                    </form>
                  </td>";
            echo "<td>R$ " . number_format($total_item, 2, ',', '.') . "</td>";
            echo "<td><a href='remover.php?id=$idproduto' class='btn btn-danger btn-sm'>Remover</a></td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
        echo "<div class='total-box'><h3>Total da compra: R$ " . number_format($total, 2, ',', '.') . "</h3></div>";
    }
    ?>

    <div class="acoes">
        <a href="formpedido.php">Continuar Comprando</a>
        <a href="#" id="finalizarCompra">Finalizar Compra</a>
    </div>

    <div id="mensagemFinal">
        Pedido sendo preparado...<br>
        <a href="#" class="text-decoration-none" style="color:#2E4A2B;">Rastrear pedido</a>
    </div>
</div>

<script>
document.getElementById('finalizarCompra')?.addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('.container table')?.remove();
    document.querySelector('.total-box')?.remove();
    document.querySelector('.acoes')?.remove();
    document.getElementById('mensagemFinal').style.display = 'block';
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

Esse código mantém toda a lógica do seu carrinho original, mas agora com estilização completa em Bootstrap e integração visual com o cardápio Xavier.

O carrinho exibe os produtos cadastrados automaticamente.
O botão Finalizar Compra mostra a mensagem “Pedido sendo preparado... Rastrear pedido”.
O layout segue a mesma paleta e tipografia do restante do sistema.