<?php
require_once "verificarlogado.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE PRODUTOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
</head>

<body class="bodylista">

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
        </ul>
      </div>
    </div>
  </nav>

  <!-- Espaço para compensar a navbar fixa -->
  <div style="height: 80px;"></div>

  <div class="cardlista p-4 mt-4">
    <h1 class="titulolista mb-3">LISTA DE PRODUTOS</h1>
    <p class="subtitulolista mb-4">Gerencie os produtos cadastrados no sistema</p>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $lista_produtos = listarprodutos($conexao);

    if (count($lista_produtos) == 0) {
        echo "<p>Não há produtos cadastrados.</p>";
    } else {
    ?>
      <div class="table-responsive">
        <table class="table tabela-usuarios table-striped-columns align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>FOTO</th>
              <th>NOME</th>
              <th>PREÇO</th>
              <th>CATEGORIA</th>
              <th colspan="2">AÇÃO</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($lista_produtos as $produto) {
              $idprodutos = $produto['idprodutos'];
              $nome_produto = $produto['nome_produto'];
              $preco_venda = $produto['preco_venda'];
              $nome_categoria = $produto['nome_categoria'];
              $foto = isset($produto['foto']) ? $produto['foto'] : "";

              echo "<tr>";
              echo "<td>$idprodutos</td>";

              if ($foto != "") {
                echo "<td><img src='fotos/$foto' width='80' class='rounded shadow-sm'></td>";
              } else {
                echo "<td>Sem foto</td>";
              }

              echo "<td>$nome_produto</td>";
              echo "<td>R$ $preco_venda</td>";
              echo "<td>$nome_categoria</td>";
              echo "<td><a href='formprodutos.php?id=$idprodutos' class='btn btn-editar'>EDITAR</a></td>";
              echo "<td><a href='deletarprodutos.php?id=$idprodutos' class='btn btn-excluir'>EXCLUIR</a></td>";
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