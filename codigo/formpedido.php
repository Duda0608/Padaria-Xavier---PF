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

    <div class="container my-5">
        <div class="row">
            <!-- Sidebar Categorias -->
            <aside class="col-md-3 mb-4">
                <input type="text" class="form-control mb-3" placeholder="O que você procura?" />
                <ul class="list-group">
                    <li class="list-group-item">Todas as categorias disponíveis</li>
                    <li class="list-group-item active">Pães</li>
                    <li class="list-group-item">Sanduíches e salgados</li>
                    <li class="list-group-item">Bolos</li>
                    <li class="list-group-item">Café e bebidas</li>
                    <li class="list-group-item">Doces finos</li>
                    <li class="list-group-item">Promoções</li>
                </ul>
            </aside>



            <a href="destruir_carrinho.php">destruir carrinho</a>

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


            <!-- [[[CHAMAR UMA FUNÇÃO QUE TRAZ TODOS OS PRODUTOS LÁ DO BANCO -->
            <!-- [[[GUARDAR ISSO NUMA VARIÁVEL: $PRODUTOS -->

            <!-- FOR QUE IMPRIME TODOS OS PRODUTOS (EXEMPLO LÁ NO INDEX DO EXEMPLO-CARRINHOggg) -->


            <!-- DEPOIS QUE O USUÁRIO SELECIONAR OS PRODUTSO QUE ELE QUER, E PREENCHER A FORMA DE PAGAMENTO, LOCAL DE ENTREGA, ELE CLICA NO BOTÃO SALVARvvvv -->

            <!-- VOCÊ CRIA UM ARQUIVO QUE VAI SER CHAMADO NESSE MOMENTO, ESSE ARQUIVO QUE É CHAMADO ELE DEVE GRAVAR OS DADOS NA TABELA DO PEDIDO E DEPOIS NA TABELA DOS ITENS E PRONTO -->


            <!--form cvadastrar pedido-->
            <form action="salvarpedido.php?id=<?php echo $id; ?>" method="post" class="mb-5">

                <h2>Cadastrar pedido</h2>
                <div class="mb-3">
                    <label for="valor" class="form_label">Valor</label>
                    <input type="text" class="form-control" id="valor" name="valor" value="<?php echo $valor; ?>"><br><br>
                </div>


                <div class="mb-3">
                    <label for="data" class="form_label">Data</label>
                    <input type="date" class="form-control" id="data" name="data" value="<?php echo $data; ?>"><br><br>
                </div>

                <div class="mb-3">
                    <label for="pagamento" class="form_label">Forma de pagamento</label>
                    <input type="text" class="form-control" id="pagamento" name="pagamento" value="<?php echo $pagamento; ?>"><br><br>
                </div>


                <div class="mb-3">
                    <label for="entrega" class="form_label">Local de entrega</label>
                    <input type="text" class="form-control" id="entrega" name="entrega" value="<?php echo $entrega; ?>"><br><br>
                </div>

                <input type="submit" value="<?php echo $botao; ?>">
            </form>
        </div>
    </div>
    
</body>
</html>
