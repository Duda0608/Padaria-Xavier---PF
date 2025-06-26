<?php
$nome = @$_POST["nome"];
$descricao = @$_POST["descricao"];

if ($nome != "") {
  salvarcategoria($conexao, $nome, $descricao);
  echo "Categoria salva.<br><br>";
}
?>

<h3>Salvar Categoria</h3>
<form method="POST">
  Nome: <br>
  <input type="text" name="nome"><br><br>
  Descrição:<br>
  <input type="text" name="descricao"><br><br>
  
  <input type="submit" value="Salvar Categoria">
</form>

