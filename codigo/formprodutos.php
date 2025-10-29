<?php
require_once "verificarlogado.php";
if (isset($_GET['id'])) {
    require_once "conexao.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_produtos WHERE idprodutos = $id";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);
    $nome = $linha['nome'];
    $preco_venda = $linha['preco_venda'];
    $tbcategoria_idcategoria = $linha['tbcategoria_idcategoria'];
    $botao = "atualizar";
} else {
    $id = 0;
    $nome = "";
    $preco_venda = "";
    $tbcategoria_idcategoria = "";
    $botao = "cadastrar";
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Produtos</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
</head>

<body class="teste">
    <div class="cartaoproduto">
        <h1>Produtos</h1>
        <p>Preencha as informações do produto</p>
        <form action="salvarprodutos.php?id=<?php echo $id; ?>" method="post">
            <div class="mb-3 text-start"> <label for="nome" class="formproduto">NOME</label> <input type="text" class="controleproduto" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" placeholder="Nome do produto" required> </div>
        <div class="mb-3 text-start"> <label for="preco_venda" class="formproduto">PREÇO</label> <input type="number" step="0.01" max="99999999.99" class="controleproduto" id="preco_venda" name="preco_venda" value="<?php echo htmlspecialchars($preco_venda); ?>" placeholder="0,00" required> </div> <?php require_once "conexao.php";
                                                                                                                                                                                                                                                                                $categorias = mysqli_query($conexao, "SELECT idcategoria, nome FROM tb_categorias"); ?> <div class="mb-4 text-start"> <label for="tbcategoria_idcategoria" class="formproduto">Categoria</label> <select class="controleproduto" id="tbcategoria_idcategoria" name="tbcategoria_idcategoria" required> <?php while ($cat = mysqli_fetch_assoc($categorias)) { ?> <option value="<?php echo $cat['idcategoria']; ?>" <?php if ($cat['idcategoria'] == $tbcategoria_idcategoria) echo 'selected'; ?>> <?php echo htmlspecialchars($cat['nome']); ?> </option> <?php } ?> </select> </div> <button type="submit" class="btn-custom"><?php echo $botao; ?></button>
        </form>
    </div>
    <div class="footer-text">Sistema de Acesso Seguro</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>