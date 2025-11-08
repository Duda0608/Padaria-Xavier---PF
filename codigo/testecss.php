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
    <style>
        /* Reset básico para consistência */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Corpo da página */
        body.corpopedido {
            font-family: 'Helvetica Neue', Arial, sans-serif; /* Sans-serif moderna */
            background-color: #FFFFFF; /* Branco puro */
            color: #1A1A1A; /* Preto suave para textos */
            line-height: 1.6;
            letter-spacing: 0.5px; /* Espaçamento generoso entre letras */
        }

        /* Navbar */
        .navbar {
            background-color: #2F4A32; /* Verde escuro */
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            text-transform: uppercase; /* Caixa alta */
            letter-spacing: 2px; /* Espaçamento maior entre caracteres */
            color: #FFFFFF;
        }

        .navbar-brand span {
            color: #C79B62; /* Tom de madeira para o símbolo */
        }

        .nav-link {
            color: #FFFFFF !important;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #F5F2EC !important; /* Creme/bege ao hover */
        }

        /* Banner */
        .banner {
            background-color: #2F4A32; /* Verde escuro sólido para fidelidade à paleta */
            color: #FFFFFF;
            text-align: center;
            padding: 4rem 2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .banner small {
            font-size: 1.2rem;
            letter-spacing: 1px;
            display: block;
            margin-top: 0.5rem;
            opacity: 0.9;
        }

        /* Container principal */
        .container.my-5 {
            background-color: #F5F2EC; /* Creme/bege claro */
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        /* Sidebar Categorias */
        aside.col-md-3 {
            background-color: #FFFFFF;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        aside .form-control {
            border: 1px solid #2F4A32;
            border-radius: 4px;
            padding: 0.75rem;
        }

        aside .list-group-item {
            background-color: #F5F2EC;
            border: none;
            color: #1A1A1A;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        aside .list-group-item.active {
            background-color: #2F4A32;
            color: #FFFFFF;
        }

        /* Link para destruir carrinho */
        a[href="destruir_carrinho.php"] {
            display: block;
            margin: 1rem 0;
            color: #2F4A32;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a[href="destruir_carrinho.php"]:hover {
            color: #A67C52;
        }

        /* Formulário de seleção de produtos */
        form[action="adicionar.php"] {
            background-color: #FFFFFF;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #2F4A32;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
        }

        .produtolista {
            list-style: none;
            padding: 0;
        }

        .produtolista li {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #F5F2EC;
            background-color: #FFFFFF;
            transition: background-color 0.3s ease;
        }

        .produtolista li:hover {
            background-color: #F5F2EC;
        }

        .produtolista li label {
            margin-right: 1rem;
        }

        .produtolista li input[type="checkbox"] {
            transform: scale(1.2);
        }

        .produtolista li .preco {
            font-weight: bold;
            color: #2F4A32;
            margin-right: 1rem;
        }

        .produtolista li input[type="number"] {
            width: 60px;
            margin-left: auto;
            border: 1px solid #2F4A32;
            border-radius: 4px;
            padding: 0.25rem;
        }

        input[type="submit"] {
            background-color: #2F4A32;
            color: #FFFFFF;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #A67C52;
        }

        /* Formulário de cadastrar pedido */
        form[action*="salvarpedido.php"] {
            background-color: #FFFFFF;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .form-label {
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #2F4A32;
            font-weight: 500;
        }

        .form-control {
            border: 1px solid #2F4A32;
            border-radius: 4px;
            padding: 0.75rem;
            background-color: #F5F2EC;
        }

        .form-control:focus {
            border-color: #A67C52;
            box-shadow: 0 0 0 0.2rem rgba(47, 74, 50, 0.25); /* Verde escuro com transparência */
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .banner {
                padding: 2rem 1rem;
                font-size: 2rem;
            }

            .container.my-5 {
                padding: 1rem;
            }

            aside.col-md-3 {
                margin-bottom: 2rem;
            }
        }
    </style>
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

            <div class="col-md-9">
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

                <!-- Formulário para cadastrar pedido -->
                <form action="salvarpedido.php?id=<?php echo $id; ?>" method="post" class="mb-5">
                    <h2>Cadastrar pedido</h2>
                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="text" class="form-control" id="valor" name="valor" value="<?php echo $valor; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="data" class="form-label">Data</label>
                        <input type="date" class="form-control" id="data" name="data" value="<?php echo $data; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="pagamento" class="form-label">Forma de pagamento</label>
                        <input type="text" class="form-control" id="pagamento" name="pagamento" value="<?php echo $pagamento; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="entrega" class="form-label">Local de entrega</label>
                        <input type="text" class="form-control" id="entrega" name="entrega" value="<?php echo $entrega; ?>">
                    </div>

                    <input type="submit" value="<?php echo $botao; ?>">
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
