<?php
require_once "verificarlogado.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE PEDIDOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
        </ul>
      </div>
    </div>
  </nav>

  
  <div style="height: 80px;"></div>

  <div class="cardlista p-4 mt-4">
    <h1 class="titulolista mb-3">LISTA DE PEDIDOS</h1>
    <p class="subtitulolista mb-4">Gerencie os pedidos realizados no sistema</p>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $lista_pedido = listarpedido($conexao);

    if (count($lista_pedido) == 0) {
        echo "<p>NÃO HÁ PEDIDOS.</p>";
    } else {
    ?>
      <div class="table-responsive">
        <table class="table tabela-usuarios table-striped-columns align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>VALOR</th>
              <th>DATA</th>
              <th>PAGAMENTO</th>
              <th>ENTREGA</th>
              <th colspan="2">AÇÃO</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($lista_pedido as $pedido) {
              $idpedido = $pedido['idpedido'];
              $valor = $pedido['valor'];
              $data = $pedido['data'];
              $pagamento = $pedido['pagamento'];
              $entrega = $pedido['entrega'];

              echo "<tr>";
              echo "<td>$idpedido</td>";
              echo "<td>R$ $valor</td>";
              echo "<td>$data</td>";
              echo "<td>$pagamento</td>";
              echo "<td>$entrega</td>";
              echo "<td><a href='formpedido.php?id=$idpedido' class='btn btn-editar'>EDITAR</a></td>";
              echo "<td><a href='deletarpedido.php?id=$idpedido' class='btn btn-excluir'>EXCLUIR</a></td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    <?php } ?>

    <div class="mt-4">
      <a href="home.php" class="btn btn-voltar">VOLTAR</a>
    </div>
  </div>

</body>

</html>