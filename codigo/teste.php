<?php require_once "verificarlogado.php";
if (isset($_GET['id'])) {
    require_once "conexao.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_produtos WHERE idprodutos = $id";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);
    $nome = $linha['nome'];
    $preco_venda = $linha['preco_venda'];
    $tbcategoria_idcategoria = $linha['tbcategoria_idcategoria'];
    $botao = "Atualizar";
} else {
    $id = 0;
    $nome = "";
    $preco_venda = "";
    $tbcategoria_idcategoria = "";
    $botao = "Cadastrar";
} ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #2E4A2B;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .cartaoproduto {
            background-color: #355E3B;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .cartaoproduto h1 {
            font-family: 'Playfair Display', serif;
            color: #E8DCC0;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .cartaoproduto p {
            color: #D1D1D1;
            margin-bottom: 2rem;
        }

        .formproduto {
            color: #E8DCC0;
            font-weight: 500;
            font-size: 0.9rem;
            text-align: left;
            display: block;
            margin-bottom: 5px;
        }

        .controleproduto {
            width: 100%;
            background-color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px;
            color: #333;
            font-size: 0.95rem;
            margin-bottom: 10px;
        }

        .controleproduto:focus {
            outline: none;
            box-shadow: 0 0 0 2px #c4a574;
        }

        .btn-custom {
            background-color: #c4a574;
            color: #2E4A2B;
            border: none;
            border-radius: 6px;
            padding: 10px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #d4c5a9;
        }

        .footer-text {
            color: #D1D1D1;
            font-size: 0.85rem;
            text-align: center;
            margin-top: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="cartaoproduto">
        <h1>Produtos</h1>
        <p>Preencha as informações do produto</p>
        <form action="salvarprodutos.php?id=<?php echo $id; ?>" method="post">
            <div class="mb-3 text-start"> <label for="nome" class="formproduto">Nome</label> <input type="text" class="controleproduto" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" placeholder="Nome do produto" required> </div>
            <div class="mb-3 text-start"> <label for="preco_venda" class="formproduto">Preço</label> <input type="text" class="controleproduto" id="preco_venda" name="preco_venda" value="<?php echo htmlspecialchars($preco_venda); ?>" placeholder="0,00" required> </div> <?php require_once "conexao.php";
                                                                                                                                                                                                                                                                                $categorias = mysqli_query($conexao, "SELECT idcategoria, nome FROM tb_categorias"); ?> <div class="mb-4 text-start"> <label for="tbcategoria_idcategoria" class="formproduto">Categoria</label> <select class="controleproduto" id="tbcategoria_idcategoria" name="tbcategoria_idcategoria" required> <?php while ($cat = mysqli_fetch_assoc($categorias)) { ?> <option value="<?php echo $cat['idcategoria']; ?>" <?php if ($cat['idcategoria'] == $tbcategoria_idcategoria) echo 'selected'; ?>> <?php echo htmlspecialchars($cat['nome']); ?> </option> <?php } ?> </select> </div> <button type="submit" class="btn btn-custom"><?php echo $botao; ?></button>
        </form>
    </div>
    <div class="footer-text">Sistema de Acesso Seguro</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>