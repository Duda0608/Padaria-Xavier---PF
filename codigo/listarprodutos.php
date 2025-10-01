<?php
require_once "verificarlogado.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lista de produtos</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $lista_produtos = listarprodutos($conexao);

    if (count($lista_produtos) == 0) {
        echo "Não ha produtos";
    
    } else {
    ?>

        <table border="1">
            <tr>
                <td>id</td>
                <td>nome</td>
                <td>preco_venda</td>
                <td>categoria</td>
                <td colspan="2">açao</td>
            </tr>

        <?php
        foreach ($lista_produtos as $produto) {
            $idprodutos = $produto['idprodutos'];
            $nome_produto = $produto['nome_produto'];
            $preco_venda = $produto['preco_venda'];
            // $tbcategoria_idcategoria = $produto['tbcategoria_idcategoria'];
            $nome_categoria = $produto['nome_categoria'];


            echo "<tr>";
            echo "<td>$idprodutos</td>";
            echo "<td>$nome_produto</td>";
            echo "<td>$preco_venda</td>";
            echo "<td>$nome_categoria</td>";
            // echo "<td>$tbcategoria_idcategoria</td>";


            echo "<td><a href='formprodutos.php?id=$idprodutos'>Editar</a></td>";
            echo "<td><a href='deletarprodutos.php?id=$idprodutos'>Excluir</a></td>";
            echo "</tr>";


        }
    }
        ?>
        </table>
        </body>

</html>