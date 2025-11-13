<?php
require_once "verificarlogado.php";
require_once "conexao.php";
require_once "funcoes.php";
$lista_usuario = listarusuario($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="estilo.css">
</head>

<body class="bodylista">

  
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

  
  <div style="height: 80px;"></div>


  
  <div class="container cardlista p-4 mt-4">
    <?php if (count($lista_usuario) == 0) { ?>
      <div class="alert alert-warning text-center">Não existem usuários cadastrados.</div>
    <?php } else { ?>
      <div class="table-responsive">
        <table class="table table-borderless align-middle text-center tabela-usuarios">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Telefone</th>
              <th>Endereço</th>
              <th>Email</th>
              <th colspan="2">Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($lista_usuario as $usuario) { ?>
              <tr>
                <td><?= $usuario['idusuario'] ?></td>
                <td><?= $usuario['nome'] ?></td>
                <td><?= $usuario['cpf'] ?></td>
                <td><?= $usuario['telefone'] ?></td>
                <td><?= $usuario['endereco'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td><a href="formusuario.php?id=<?= $usuario['idusuario'] ?>" class="btn btn-sm btn-editar">Editar</a></td>
                <td><a href="deletarusuario.php?id=<?= $usuario['idusuario'] ?>" class="btn btn-sm btn-excluir">Excluir</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    <?php } ?>

    <div class="text-center mt-4">
      <a href="home.php" class="btn btn-voltar">Voltar</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
