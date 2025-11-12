<?php
require_once "verificarlogado.php";
require_once "conexao.php";
require_once "funcoes.php";

$lista = listarcategoria($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE CATEGORIAS</title>
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
          <li class="nav-item">
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Espaço para compensar a navbar fixa -->
  <div style="height: 80px;"></div>


    <div class="cardlista p-4">
        <h1 class="titulolista mb-3">LISTA DE CATEGORIAS</h1>
        <p class="subtitulolista mb-4">Gerencie as categorias cadastradas no sistema</p>

        <?php
        if (count($lista) == 0) {
            echo "<p>Não existem categorias cadastradas.</p>";
        } else {
        ?>
            <div class="table-responsive">
                <table class="table tabela-usuarios table-striped-columns align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DESCRIÇÃO</th>
                            <th>NOME</th>
                            <th colspan="2">AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($lista as $categoria) {
                            $idcategoria = $categoria['idcategoria'];
                            $descricao = $categoria['descricao'];
                            $nome = $categoria['nome'];

                            echo "<tr>";
                            echo "<td>$idcategoria</td>";
                            echo "<td>$descricao</td>";
                            echo "<td>$nome</td>";
                            echo "<td><a href='formcategoria.php?id=$idcategoria' class='btn btn-editar'>EDITAR</a></td>";
                            echo "<td><a href='deletarcategoria.php?id=$idcategoria' class='btn btn-excluir'>EXCLUIR</a></td>";
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