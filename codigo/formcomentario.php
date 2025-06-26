<?php
$nomeCliente = @$_POST["nomeCliente"];
$comentario = @$_POST["comentario"];

if ($nomeCliente != "") {
  if ($comentario != "") {
    salvarcomentario($conexao, $nomeCliente, $comentario);
    echo "Comentário salvo.<br><br>";
  }
}
?>

<h3>Salvar Comentário</h3>
<form method="POST">
  Nome: <input type="text" name="nomeCliente"><br>
  Comentário: <input type="text" name="comentario"><br>
  <input type="submit" value="Salvar Comentário">
</form>


