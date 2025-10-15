<?php
require_once "verificarlogado.php";
require_once "conexao.php";
require_once "funcoes.php";
?>
  
<h3>SALVAR COMENTÁRIO</h3>
<form method="POST">
  NOME: <input type="text" name="usuario"><br>
  COMENTÁRIO: <input type="text" name="comentario"><br>
  <input type="submit" value="Salvar Comentário">
</form>


