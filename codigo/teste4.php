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
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cardápio Xavier</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet" />

    <style>
        /* Paleta de cores baseada na imagem */
        :root {
            --verde-escuro: #324732;
            --bege-claro: #f5f0e6;
            --marrom-madeira: #a27b5c;
            --marrom-escuro: #573726;
            --destaque: #d9c28a;
            --cinza-escuro: #3c3c3b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bege-claro);
            color: var(--cinza-escuro);
            margin: 0;
            padding-top: 65px;
        }

        /* Navbar */
        .navbar {
            background-color: var(--verde-escuro);
            font-family: 'Playfair Display', serif;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1030;
        }

        .navbar-brand {
            color: var(--destaque);
            font-weight: 700;
            font-size: 1.8rem;
        }

        .navbar-brand span {
            font-weight: 900;
            color: var(--destaque);
            margin-left: 0.2rem;
        }

        .nav-link {
            color: var(--bege-claro);
            font-weight: 500;
            font-style: italic;
            letter-spacing: 0.1rem;
            transition: color 0.3s;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: var(--destaque);
            text-decoration: underline;
        }

        /* Ícones direita da navbar */
        .navbar-icons {
            color: var(--bege-claro);
            font-size: 1.4rem;
            cursor: pointer;
            margin-left: 1.5rem;
        }

        .navbar-icons:hover {
            color: var(--destaque);
        }

        /* Banner */
        .banner {
            background-image: url('https://images.unsplash.com/photo-1516685304081-de7947d419d4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            /* imagem genérica bakery */
            background-size: cover;
            background-position: center;
            height: 160px;
            display: flex;
            align-items: center;
            padding-left: 3rem;
            color: var(--bege-claro);
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
            border-bottom: 3px solid var(--destaque);
        }

        .banner small {
            font-size: 1.2rem;
            font-weight: 500;
            display: block;
            margin-top: 6px;
            font-style: normal;
        }

        /* Sidebar categorias */
        .list-group-item.active,
        .list-group-item.active:hover {
            background-color: var(--verde-escuro);
            border-color: var(--verde-escuro);
            color: var(--destaque);
            font-weight: 600;
        }

        .list-group-item {
            font-weight: 500;
            border-left: 4px solid transparent;
            transition: all 0.3s;
            cursor: pointer;
        }

        .list-group-item:hover {
            background-color: var(--marrom-madeira);
            color: var(--bege-claro);
            border-left-color: var(--destaque);
        }

        /* Form inputs */
        input[type="text"],
        input[type="date"],
        input[type="number"] {
            border-radius: 0.4rem;
            border: 1.5px solid var(--marrom-escuro);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="number"]:focus {
            border-color: var(--verde-escuro);
            box-shadow: 0 0 5px var(--verde-escuro);
            outline: none;
        }

        /* Botões */
        input[type="submit"],
        button {
            background-color: var(--verde-escuro);
            border: none;
            color: var(--destaque);
            font-weight: 700;
            padding: 0.6rem 1.2rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: var(--marrom-escuro);
            color: #fff;
        }

        /* Lista produtos no form */
        ul.produtos-lista {
            list-style: none;
            padding-left: 0;
            max-height: 320px;
            overflow-y: auto;
            border: 1px solid var(--marrom-escuro);
            border-radius: 0.5rem;
            background-color: #fff8f0;
        }

        ul.produtos-lista li {
            padding: 10px 15px;
            border-bottom: 1px solid var(--marrom-escuro);
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-family: 'Playfair Display', serif;
        }

        ul.produtos-lista li:last-child {
            border-bottom: none;
        }

        ul.produtos-lista input[type="checkbox"] {
            margin-right: 12px;
            transform: scale(1.2);
            cursor: pointer;
        }

        ul.produtos-lista input[type="number"] {
            width: 60px;
            border-radius: 0.4rem;
            border: 1px solid var(--marrom-escuro);
            text-align: center;
        }

        ul.produtos-lista span.preco {
            font-weight: 700;
            font-style: italic;
            color: var(--marrom-escuro);
        }

        /* Links "destruir carrinho" */
        a.destruir-carrinho {
            display: inline-block;
            margin-bottom: 1rem;
            font-weight: 600;
            color: var(--marrom-escuro);
            cursor: pointer;
            transition: color 0.3s;
        }

        a.destruir-carrinho:hover {
            color: var(--verde-escuro);
            text-decoration: underline;
        }

        /* Títulos */
        h1,
        h2,
        h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--verde-escuro);
            margin-bottom: 1rem;
        }

        /* Responsividade menor */
        @media (max-width: 767.98px) {
            .banner {
                font-size: 1.7rem;
                padding-left: 1.5rem;
                height: 120px;
            }

            ul.produtos-lista li {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }

            ul.produtos-lista input[type="number"] {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">xavier<span>✦</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item"><a class="nav-link" href="#">Página Inicial</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cardápio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Promoção</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pedidos</a></li>
                </ul>
            </div>
        </div>
    </nav>//

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
            </aside>//

            <main class="col-md-9">
                <a href="destruir_carrinho.php" class="destruir-carrinho">Destruir carrinho</a>/

                <!-- Form adiciona produtos -->
                <form action="adicionar.php" method="post" class="mb-5">
                    <h2>Selecionar Produtos</h2>
                    <ul class="produtos-lista">
                        <?php
                        $lista_produtos = listarprodutos($conexao);
                        foreach ($lista_produtos as $produto):
                        ?>
                            <li>
                                <label>
                                    <input type="checkbox" name="idprodutos[]" value="<?php echo $produto['idprodutos']; ?>" />
                                    <?php echo htmlspecialchars($produto['nome_produto'], ENT_QUOTES, 'UTF-8'); ?>
                                </label>
                                <div>
                                    <span class="preco">R$ <?php echo number_format($produto['preco_venda'], 2, ',', '.'); ?></span>
                                    <input type="number" name="quantidade[<?php echo $produto['idprodutos']; ?>]" value="1" min="1" />
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <input type="submit" value="Adicionar selecionados ao carrinho" />
                </form>//

                <!-- Form cadastro pedido -->
                <form action="salvarpedido.php?id=<?php echo $id; ?>" method="post" class="mb-5">
                    <h2>Cadastrar Pedido</h2>
                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="text" class="form-control" id="valor" name="valor" value="<?php echo htmlspecialchars($valor); ?>" />//
                    </div>
                    <div class="mb-3">
                        <label for="data" class="form-label">Data</label>
                        <input type="date" class="form-control" id="data" name="data" value="<?php echo $data; ?>" />
                    </div>//

                    <div class="mb-3">
                        <label for="pagamento" class="form-label">Forma de Pagamento</label>
                        <input type="text" class="form-control" id="pagamento" name="pagamento" value="<?php echo htmlspecialchars($pagamento); ?>" />
                    </div>//

                    
                    <div class="mb-3">
                        <label for="entrega" class="form-label">Local de Entrega</label>
                        <input type="text" class="form-control" id="entrega" name="entrega" value="<?php echo htmlspecialchars($entrega); ?>" />
                    </div>
                    <input type="submit" value="<?php echo ucfirst($botao); ?>" />
                </form>
            </main>
        </div>
    </div>

    <!-- Bootstrap js bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>