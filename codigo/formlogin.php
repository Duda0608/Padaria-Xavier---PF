<?php
$email = @$_POST["email"];
$senha = @$_POST["senha"];

if ($email != "") {
  if ($senha != "") {
    salvarlogin($conexao, $email, $senha);
    echo "Login salvo.<br><br>";
  }
}
?>

<h3>SALVAR LOGIN</h3>
<form method="POST">
  EMAIL: <input type="text" name="email"><br>
  SENHA: <input type="password" name="senha"><br>
  <input type="submit" value="Salvar Login">
</form>

