<?php
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";

if (isset($_GET['id'])) {
  require_once "conexao.php";
  $id = $_GET['id'];

  $sql = "SELECT * FROM tb_promocaos WHERE idpromocao = $id";
  $resultado = mysqli_query($conexao, $sql);
  $linha = mysqli_fetch_array($resultado);

  $datainicio = $linha['datainicio'];
  $datafinal = $linha['datafinal'];
  $valor = $linha['valor'];
  $tb_produtos_idprodutos = $linha['tb_produtos_idprodutos'];

  $botao = "Atualizar";
} else {
  $id = 0;
  $datainicio = "";
  $datafinal = "";
  $valor = "";
  $tb_produtos_idprodutos = "";
  $botao = "Cadastrar";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Promoção</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="estilo.css">
</head>

<body class="corpousu">
  <div class="cartaousu">
    <h2>PROMOÇÃO</h2>
    <p>PREENCHA AS INFORMAÇÕES ABAIXO</p>

    <form id="formpromocao" action="salvarpromocao.php?id=<?php echo $id; ?>" method="post">

      <div class="mb-3">
        <label for="datainicio" class="formusu">DATA INÍCIO</label>
        <input type="date" class="form-control" id="datainicio" name="datainicio" value="<?php echo $datainicio; ?>" required>
      </div>

      <div class="mb-3">
        <label for="datafinal" class="formusu">DATA FINAL</label>
        <input type="date" class="form-control" id="datafinal" name="datafinal" value="<?php echo $datafinal; ?>" required>
      </div>

      <div class="mb-3">
        <label for="valor" class="formusu">VALOR</label>
        <input type="number" class="form-control" id="valor" name="valor" max="99999999999" value="<?php echo $valor; ?>" required>
      </div>

      <?php
      require_once "conexao.php";
      $produto = mysqli_query($conexao, "SELECT idprodutos, nome FROM tb_produtos");
      ?>

      <div class="mb-3">
        <label for="tb_produtos_idprodutos" class="formusu">PRODUTO</label>
        <select class="form-control" id="tb_produtos_idprodutos" name="tb_produtos_idprodutos" required>
          <?php while ($cat = mysqli_fetch_assoc($produto)) { ?>
            <option value="<?php echo $cat['idprodutos']; ?>"
              <?php if ($cat['idprodutos'] == $tb_produtos_idprodutos) echo 'selected'; ?>>
              <?php echo htmlspecialchars($cat['nome']); ?>
            </option>
          <?php } ?>
        </select>
      </div>

      <button type="submit" class="btn-custom"><?php echo $botao; ?></button>
    </form>
  </div>
</body>

</html>