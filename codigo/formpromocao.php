<?php
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";

if(isset($_GET['id'])) {
    
    require_once "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT *FROM tb_promocoes WHERE idpromocao = $id";

    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultado);

    $produto = $linha['produto'];
    $datainicio = $linha['datainicio'];
    $datafinal = $linha['datafinal'];
    $valor = $linha['valor'];

    $botao = "atualizar";
} else {
    $id = 0;
    $produto = "";
    $datainicio = "";
    $datafinal = "";
    $valor = "";

    $botao = "Cadastrar";
}

?>

<h3>Salvar Promoção</h3>
<form id="formpromocao" action="salvarpromocao.php?id=<?php echo $id; ?>" method="post">
  Produto: <input type="text" name="produto" id="produto><br>
  Data Início: <input type="date" name="datainicio"><br>
  Data Final: <input type="date" name="datafinal"><br>
  Valor: <input type="text" name="valor"><br>
  <input type="submit" value="Salvar Promoção">
</form>

