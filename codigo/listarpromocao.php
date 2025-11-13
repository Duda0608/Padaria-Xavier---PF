<?php
require_once "verificarlogado.php";
require_once "conexao.php";
require_once "funcoes.php";

$lista_promocao = listarpromocao($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Promoções</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
  
    <div class="cardlista p-4">
        <h1 class="titulolista mb-2">Lista de Promoções</h1>
        <p class="subtitulolista mb-4">Visualize, edite ou exclua as promoções cadastradas</p>

        <?php if (count($lista_promocao) == 0) { ?>
            <p>Não existe promoção cadastrada.</p>
        <?php } else { ?>
            <div class="table-responsive">
                <table class="table tabela-usuarios align-middle text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data Início</th>
                            <th>Data Final</th>
                            <th>Valor</th>
                            <th>Produto</th>
                            <th colspan="2">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista_promocao as $promocao) { ?>
                            <tr>
                                <td><?= $promocao['idpromocao'] ?></td>
                                <td><?= $promocao['datainicio'] ?></td>
                                <td><?= $promocao['datafinal'] ?></td>
                                <td><?= $promocao['valor'] ?></td>
                                <td><?= $promocao['nome_produtos'] ?></td>
                                <td>
                                    <a href="formpromocao.php?id=<?= $promocao['idpromocao'] ?>" class="btn btn-editar">Editar</a>
                                </td>
                                <td>
                                    <a href="deletarpromocao.php?id=<?= $promocao['idpromocao'] ?>" class="btn btn-excluir">Excluir</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>

        <a href="home.php" class="btn btn-voltar mt-3">Voltar</a>
    </div>
</body>

</html>