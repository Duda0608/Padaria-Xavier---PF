<?php
require_once "conexao.php";
require_once "funcoes.php";

$email = @$_POST["email"];
$senha = @$_POST["senha"];

if ($email != "") {
  if ($senha != "") {
    salvarlogin($conexao, $email, $senha);
    echo "<div class='alert alert-success text-center mt-3'>Login salvo com sucesso!</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Salvar Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="estilo.css">
</head>

<body class="corpologin">
  <div class="cardlogin">
    <h2 class="titulologin">Salvar Login</h2>
    <p class="subtitulologin">Preencha as informações abaixo</p>

    <form method="POST">
      <div class="mb-3">
        <label for="email" class="formlogin">E-MAIL</label>
        <input type="email" class="form-control controllogin" id="email" name="email" placeholder="seu@email.com" required>
      </div>

      <div class="mb-3">
        <label for="senha" class="formlogin">SENHA</label>
        <input type="password" class="form-control controllogin" id="senha" name="senha" placeholder="********" required>
      </div>

      <button type="submit" class="btn botaologin">Salvar Login</button>
    </form>

    <a href="home.php" class="linklogin">Voltar</a>
    <footer class="subinfologin">Sistema de Acesso Seguro</footer>
  </div>
</body>
</html>