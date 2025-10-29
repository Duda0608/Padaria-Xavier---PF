<?php
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";

if (isset($_GET['id'])) {

  require_once "conexao.php";
  $id = $_GET['id'];

  $sql = "SELECT *FROM tb_promocaos WHERE idpromocao = $id";

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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Salvar Promoção</title>
</head>

<body>
  <h3>SALVAR PROMOÇÃO</h3>
  <form id="formpromocao" action="salvarpromocao.php?id=<?php echo $id; ?>" method="post">
    DATA INÍCIO: <input type="date" name="datainicio" value="<?php echo $datainicio; ?>"><br>
    DATA FINAL: <input type="date" name="datafinal" value="<?php echo $datafinal; ?>"><br>
    VALOR: <input type="text" name="valor" value="<?php echo $valor; ?>"><br>

    <?php
    require_once "conexao.php";
    // Consulta os produtos
    $produto = mysqli_query($conexao, "SELECT idprodutos, nome FROM tb_produtos");
    ?>

    PRODUTO:<br>
    <select name="tb_produtos_idprodutos">
      <!-- <option value="">Selecione um Produto</option> -->
      <?php while ($cat = mysqli_fetch_assoc($produto)) { ?>
        <option value="<?php echo $cat['idprodutos']; ?>"
          <?php if ($cat['idprodutos'] == $tb_produtos_idprodutos) echo 'selected'; ?>>
          <?php echo htmlspecialchars($cat['nome']); ?>
        </option>
      <?php } ?>
    </select><br><br>


    <input type="submit" value="<?php echo $botao; ?>">
  </form>
</body>

</html>