<?php
require_once "verificarlogado.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE PRODUTOS</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="estilo.css">

<body>
    <h1>LISTA DE PRODUTOS</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $lista_produtos = listarprodutos($conexao);

    if (count($lista_produtos) == 0) {
        echo "Não há produtos";
    } else {
    ?>
        <table class="table table-striped-columns" border="1">
            <tr>
                <td>ID</td>
                <td>FOTO</td>
                <td>NOME</td>
                <td>PREÇO</td>
                <td>CATEGORIA</td>
                <td colspan="2">AÇÃO</td>
            </tr>

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
                    echo "<td><img src='fotos/$foto' width='80'></td>";
                } else {
                    echo "<td>Sem foto</td>";
                }

                echo "<td>$nome_produto</td>";
                echo "<td>R$ $preco_venda</td>";
                echo "<td>$nome_categoria</td>";
                echo "<td><a href='formprodutos.php?id=$idprodutos'>EDITAR</a></td>";
                echo "<td><a href='deletarprodutos.php?id=$idprodutos'>EXCLUIR</a></td>";
                echo "</tr>";
            }
            ?>
        </table>

    <?php } ?>

    <a href="home.php">SAIR</a>
    <br><br>

</body>

</html>