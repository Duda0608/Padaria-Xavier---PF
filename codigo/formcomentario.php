<?php
require_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Comentário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="estilo.css">
</head>

<body class="corpobody">

  <!-- NAVBAR FIXA NO TOPO USANDO O MESMO CSS DA PÁGINA INICIAL -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="home.php">XAVIER<span>✦</span></a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
        aria-controls="navbarMenu" aria-expanded="false" aria-label="Alternar navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item"><a class="nav-link" href="home.php">Página Inicial</a></li>
          <li class="nav-item"><a class="nav-link" href="formpedido.php">Cardápio</a></li>
          <li class="nav-item"><a class="nav-link" href="formpromocao.php">Promoção</a></li>
          <li class="nav-item"><a class="nav-link" href="carrinho.php">Pedidos</a></li>
          <li class="nav-item">
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Espaço para compensar a navbar fixa -->
  <div style="height: 80px;"></div>
  <div class="cardlogin">
    <h2 class="titulo">Comentário</h2>
    <p class="subtitulo">Preencha as informações abaixo</p>

    <form method="POST" action="salvarcomentario.php">
      <div class="mb-3 text-start">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required>
      </div>

      <div class="mb-3 text-start">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="********" required>
      </div>

      <div class="mb-3 text-start">
        <label for="comentario" class="form-label">Comentário</label>
        <input type="text" class="form-control" id="comentario" name="comentario" placeholder="Escreva aqui" required>
      </div>

      <button type="submit" class="btn-custom">Salvar Comentário</button>
      <a href="home.php" class="link">Voltar</a>
    </form>

    <div class="footer">
      &copy; <?php echo date("Y"); ?> Sistema de Comentários
    </div>
  </div>
</body>

</html>