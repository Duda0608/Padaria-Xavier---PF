<?php
require_once "verificarlogado.php";
$usuario = @$_POST["usuario"];
$comentario = @$_POST["comentario"];

if ($usuario != "") {
  if ($comentario != "") {
    salvarcomentario($conexao, $usuario, $comentario);
    echo "Comentário salvo.<br><br>";
  }
}
?>

<h3>SALVAR COMENTÁRIO</h3>
<form method="POST">
  NOME: <input type="text" name="usuario"><br>
  COMENTÁRIO: <input type="text" name="comentario"><br>
  <input type="submit" value="Salvar Comentário">
</form>


