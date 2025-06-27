<?php
require_once "conexao.php";
require_once "funcoes.php";

$produto = @$_POST["produto"];
$datainicio = @$_POST["datainicio"];
$datafinal = @$_POST["datafinal"];
$valor = @$_POST["valor"];

if ($produto != "") {
  if ($datainicio != "") {
    if ($datafinal != "") {
      if ($valor != "") {
        salvarpromocao($conexao, $produto, $datainicio, $datafinal, $valor);
        echo "Promoção salva.<br><br>";
      }
    }
  }
}
?>

<h3>Salvar Promoção</h3>
<form method="POST">
  Produto: <input type="text" name="produto"><br>
  Data Início: <input type="date" name="datainicio"><br>
  Data Final: <input type="date" name="datafinal"><br>
  Valor: <input type="text" name="valor"><br>
  <input type="submit" value="Salvar Promoção">
</form>

