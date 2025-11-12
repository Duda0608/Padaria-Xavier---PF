<?php
require_once "verificarlogado.php";

if (isset($_GET['id'])) {
    require_once "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_categorias WHERE idcategoria = $id";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);

    $descricao = $linha['descricao'];
    $nome = $linha['nome'];
    $botao = "Atualizar";
} else {
    $id = 0;
    $descricao = "";
    $nome = "";
    $botao = "Cadastrar";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
</head>

<body class="corpocate">

  <!-- NAVBAR FIXA NO TOPO USANDO O MESMO CSS DA PÁGINA INICIAL -->
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

  <!-- Espaço para compensar a navbar fixa -->
  <div style="height: 80px;"></div>

  
    <div class="cartaocate">
        <h2 class="titulocate">Categoria</h2>
        <p class="subtitulocate">Preencha as informações abaixo</p>

        <form action="salvarcategoria.php?id=<?php echo $id; ?>" method="post">
            <div class="mb-3">
                <label for="nome" class="formcate">NOME</label>
                <input type="text" class="form-control controlcate" id="nome" name="nome"
                    value="<?php echo htmlspecialchars($nome); ?>" placeholder="Nome da categoria" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="formcate">DESCRIÇÃO</label>
                <input type="text" class="form-control controlcate" id="descricao" name="descricao"
                    value="<?php echo htmlspecialchars($descricao); ?>" placeholder="Descrição da categoria" required>
            </div>

            <button type="submit" class="btn botaocate"><?php echo $botao; ?></button>
        </form>

        <footer class="subinfo">Sistema de Acesso Seguro</footer>
    </div>
</body>

</html>