<?php
require_once "verificarlogado.php";
$nomeHist = @$_POST["nomeHist"];
$historico = @$_POST["historico"];

if ($nomeHist != "") {
  if ($historico != "") {
    salvarhistorico($conexao, $nomeHist, $historico);
    echo "Histórico salvo.<br><br>";
  }
}
?>

<h3>SALVAR HISTÓRICO</h3>
<form method="POST">
  NOME: <input type="text" name="nomeHist"><br>
  HISTÓRICO: <input type="text" name="historico"><br>
  <input type="submit" value="Salvar Histórico">
</form>

