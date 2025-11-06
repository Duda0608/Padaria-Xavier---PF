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
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="estilo.css">

<body>
    <h1>LISTA DE CATEGORIAS</h1>

    <?php
    if (count($lista) == 0) {
        echo "Não existem categorias cadastradas.";
    } else {
    ?>
        <table class="table table-striped-columns" border="1">
            <tr>
                <td>ID</td>
                <td>DESCRIÇÃO</td>
                <td>NOME</td>
                <td colspan="2">AÇÃO</td>
            </tr>

            <?php
            foreach ($lista as $categoria) {
                $idcategoria = $categoria['idcategoria'];
                $descricao = $categoria['descricao'];
                $nome = $categoria['nome'];

                echo "<tr>";
                echo "<td>$idcategoria</td>";
                echo "<td>$descricao</td>";
                echo "<td>$nome</td>";
                echo "<td><a href='formcategoria.php?id=$idcategoria'>EDITAR</a></td>";
                echo "<td><a href='deletarcategoria.php?id=$idcategoria'>EXCLUIR</a></td>";
                echo "</tr>";
            }
            ?>
        </table>

    <?php } ?>

    <a href="home.php">SAIR</a>
    <br><br>

</body>

</html>