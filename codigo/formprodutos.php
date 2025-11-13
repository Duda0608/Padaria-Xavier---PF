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
    $foto = $linha['foto']; // pega o nome do arquivo da foto que está salva no banco
    $botao = "atualizar";
} else {
    $id = 0;
    $nome = "";
    $preco_venda = "";
    $tbcategoria_idcategoria = "";
    $foto = ""; // começa vazio se for um cadastro novo
    $botao = "cadastrar";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
</head>

<body class="corpobody">
     
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="home.php">XAVIER<span>✦</span></a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
        aria-controls="navbarMenu" aria-expanded="false" aria-label="Alternar navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item"><a class="nav-link" href="home.php">Página Inicial</a></li>
          <li class="nav-item"><a class="nav-link" href="formpedido.php">Cardápio</a></li>
          <li class="nav-item"><a class="nav-link" href="formpromocao.php">Promoção</a></li>
          <li class="nav-item"><a class="nav-link" href="carrinho.php">Pedidos</a></li>
          <li class="nav-item">
          </li>
        </ul>
      </div>
    </div>
  </nav>

  
  <div style="height: 80px;"></div>
  
    <div class="cardlogin">
        <h2 class="titulo">Produtos</h2>
        <p class="subtitulo">Preencha as informações do produto</p>

        <form action="salvarprodutos.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

            <div class="mb-3 text-start">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">

                <?php if ($foto != "") { ?>
                    <br>
                    <img src="fotos/<?php echo $foto; ?>" width="120" class="rounded shadow-sm mt-2">
                <?php } ?>
            </div>

            <div class="mb-3 text-start">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" placeholder="Nome do produto" required>
            </div>

            <div class="mb-3 text-start">
                <label for="preco_venda" class="form-label">Preço</label>
                <input type="number" step="0.01" max="99999999.99" class="form-control" id="preco_venda" name="preco_venda" value="<?php echo $preco_venda; ?>" placeholder="0,00" required>
            </div>

            <?php
            require_once "conexao.php";
            $categorias = mysqli_query($conexao, "SELECT idcategoria, nome FROM tb_categorias");
            ?>
            <div class="mb-4 text-start">
                <label for="tbcategoria_idcategoria" class="form-label">Categoria</label>
                <select class="form-control" id="tbcategoria_idcategoria" name="tbcategoria_idcategoria" required>
                    <?php while ($cat = mysqli_fetch_assoc($categorias)) { ?>
                        <option value="<?php echo $cat['idcategoria']; ?>" <?php if ($cat['idcategoria'] == $tbcategoria_idcategoria) echo 'selected'; ?>>
                            <?php echo $cat['nome']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn-custom"><?php echo $botao; ?></button>
            <a href="home.php" class="link">Voltar </a>
        </form>

        <div class="footer">
            &copy; <?php echo date("Y"); ?> Sistema de Produtos
        </div>
    </div>
</body>

</html>