<?php
require_once "verificarlogado.php";
require_once "funcoes.php";
require_once "conexao.php";

$id = 0;
if ($_GET) {
    $id = $_GET['id'];
}

if ($id > 0) {
    $sql = "SELECT * FROM tb_pedidos WHERE idpedido = $id";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);
    $valor = $linha['valor'];
    $data = $linha['data'];
    $pagamento = $linha['pagamento'];
    $entrega = $linha['entrega'];
    $botao = "atualizar";
} else {
    $valor = "";
    $data = "";
    $pagamento = "";
    $entrega = "";
    $botao = "cadastrar";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
</head>

<body class="corpopedido">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand">xavier<span>✦</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item"><a class="nav-link" href="home.php">Página Inicial</a></li>
                    <li class="nav-item"><a class="nav-link" href="formpedido.php">Cardápio</a></li>
                    <li class="nav-item"><a class="nav-link" href="formpromocao.php">Promoção</a></li>
                    <li class="nav-item"><a class="nav-link" href="carrinho.php">Pedidos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="banner">
        <div>
            Cardápio<br />
            <small>Confira nossos produtos</small>
        </div>
    </div>






    <form action="adicionar.php" method="post" class="mb-5">

        <h2>Selecionar Produtos</h2>
        <ul class="produtolista">
            <?php
            $lista_produtos = listarprodutos($conexao);

            foreach ($lista_produtos as $listarprodutos):
            ?>
                <li>
                    <label>
                        <input type="checkbox" name="idprodutos[]" value="<?php echo $listarprodutos['idprodutos']; ?>">
                    </label>
                    <div>
                        <span class="preco">R$<?php echo $listarprodutos['preco_venda']; ?></span>
                        <?php echo $listarprodutos['nome_produto']; ?>


                        <input type="number" name="quantidade[<?php echo $listarprodutos['idprodutos']; ?>]" value="1" min="1">
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <input type="submit" value="adicionar selecionados ao carrinho">
    </form>


    <form action="salvarpedido.php?id=<?php echo $id; ?>" method="post" class="mb-5">

        
  

</body>

</html>