<?php
$email = @$_POST["email"];
$senha = @$_POST["senha"];

if ($email != "") {
  if ($senha != "") {
    salvarusuario($conexao, $email, $senha);
    echo "Login salvo.<br><br>";
  }
}
?>

<h3>Salvar Usuário</h3>
<form method="POST">
  Email: <input type="text" name="email"><br>
  Senha: <input type="password" name="senha"><br>
  <input type="submit" value="Salvar Login">
</form>

