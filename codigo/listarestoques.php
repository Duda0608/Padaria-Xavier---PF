<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lista de estoque</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $lista_estoques = listarestoque($conexao);

    if (count($lista_estoques) == 0) {
        echo "Não ha nada";
    
    } else {
    ?>
    
        <table border="1">
            <tr>
                <td>id</td>
                <td>nome</td>
                <td>tipo</td>
                <td>data</td>
                <td>quantidade</td>
                <td colspan="2">açao</td>
            </tr>
            
        <?php
        foreach ($lista_estoques as $estoque) {
            $idestoque = $estoque['idestoque'];
            $nome = $estoque['nome'];
            $tipo = $estoque['tipo'];
            $data = $estoque['data'];
            $quantidade = $estoque['quantidade'];

            echo "<tr>";
            echo "<td>$idestoque</td>";
            echo "<td>$nome</td>";
            echo "<td>$tipo</td>";
            echo "<td>$data</td>";
            echo "<td>$quantidade</td>";

            echo "<td><a href='formestoques.php?id=$idestoque'>Editar</a></td>";
            echo "<td><a href='deletarpedido.php?id=$idestoque'>Excluir</a></td>";
            echo "</tr>";


        }
    }
        ?>
        </table>
        </body>

</html>
