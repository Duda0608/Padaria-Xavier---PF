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

    if (count($lista_produto) == 0) {
        echo "Não ha produtos";
    
    } else {
    ?>

        <table border="1">
            <tr>
                <td>id</td>
                <td>nome</td>
                <td>tipo</td>
                <td>preco_venda</td>
                <td>lucro</td>
                <td colspan="2">açao</td>
            </tr>

        <?php
        foreach ($lista_produto as $produto) {
            $idproduto = $produto['idproduto'];
            $nome = $produto['nome'];
            $tipo = $produto['tipo'];
            $preco_venda = $produto['preco_venda'];
            $lucro = $produto['lucro'];


            echo "<tr>";
            echo "<td>$idproduto</td>";
            echo "<td>$nome</td>";
            echo "<td>$tipo</td>";
            echo "<td>$preco_venda</td>";
            echo "<td>$lucro</td>";


            echo "<td><a href='formprodutos.php?id=$idproduto'>Editar</a></td>";
            echo "<td><a href='deletarprodutos.php?id=$idproduto'>Excluir</a></td>";
            echo "</tr>";


        }
    }
        ?>
        </table>
        </body>

</html>