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

    $botao = "atualizar";
} else {
    $id = 0;
    $valor = "";
    $data = "";
    $pagamento = "";
    $entrega = "";

    $botao = "cadastrar";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cARDAPIO</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">

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
        <div class="row">
            <div class="col-md-3">
                <input type="text" class="form-control mb-3" placeholder="O que você procura?">
                <ul class="list-group">
                    <li class="list-group-item">Todos as categorias disponiveis</li>
                    <li class="list-group-item active" style="background-color:#2E4A2B; border-color:#2E4A2B;">Pães</li>
                    <li class="list-group-item">Sanduíches e salgados</li>
                    <li class="list-group-item">Bolos</li>
                    <li class="list-group-item">Café e bebidas</li>
                    <li class="list-group-item">Doces finos</li>
                    <li class="list-group-item">Promoções</li>
                </ul>
            </div>



            <a href="destruir_carrinho.php">destruir carrinho</a>

            <form action="adicionar.php" method="post">

                <h1>CADASTRAR PEDIDOS</h1>
                <ul>
                    <?php
                    $lista_produtos = listarprodutos($conexao);

                    foreach ($lista_produtos as $listarprodutos):
                    ?>
                        <li>
                            <input type="checkbox" name="idprodutos[]" value="<?php echo $listarprodutos['idprodutos']; ?>">
                            R$ <span><?php echo $listarprodutos['preco_venda']; ?></span>
                            <?php echo $listarprodutos['nome_produto']; ?>

                            <input type="number" name="quantidade[<?php echo $listarprodutos['idprodutos']; ?>]" value="1" min="1">
                        </li>
                    <?php endforeach; ?>


                    <input type="submit" value="adicionar selecionados ao carrinho">
            </form>


            <!-- [[[CHAMAR UMA FUNÇÃO QUE TRAZ TODOS OS PRODUTOS LÁ DO BANCO -->
            <!-- [[[GUARDAR ISSO NUMA VARIÁVEL: $PRODUTOS -->

            <!-- FOR QUE IMPRIME TODOS OS PRODUTOS (EXEMPLO LÁ NO INDEX DO EXEMPLO-CARRINHOggg) -->


            <!-- DEPOIS QUE O USUÁRIO SELECIONAR OS PRODUTSO QUE ELE QUER, E PREENCHER A FORMA DE PAGAMENTO, LOCAL DE ENTREGA, ELE CLICA NO BOTÃO SALVARvvvv -->

            <!-- VOCÊ CRIA UM ARQUIVO QUE VAI SER CHAMADO NESSE MOMENTO, ESSE ARQUIVO QUE É CHAMADO ELE DEVE GRAVAR OS DADOS NA TABELA DO PEDIDO E DEPOIS NA TABELA DOS ITENS E PRONTO -->

            <form action="salvarpedido.php?id=<?php echo $id; ?>" method="post">
                VALOR:<br>
                <input type="text" name="valor" value="<?php echo $valor; ?>"><br><br>
                DATA:<br>
                <input type="date" name="data" value="<?php echo $data; ?>"><br><br>
                FORMA DE PAGAMENTO:<br>
                <input type="text" name="pagamento" value="<?php echo $pagamento; ?>"><br><br>
                LOCAL DE ENTREGA:<br>
                <input type="text" name="entrega" value="<?php echo $entrega; ?>"><br><br>

                <input type="submit" value="<?php echo $botao; ?>">
            </form>
</body>

</html>