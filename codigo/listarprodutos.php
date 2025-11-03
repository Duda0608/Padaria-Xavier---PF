<?php
require_once "verificarlogado.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Cadastrados</title>
</head>

<body>
    <h1>PRODUTOS CADASTRADOS</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $lista_produtos = listarprodutos($conexao);

    if (count($lista_produtos) == 0) {
        echo "Não há produtos";
    } else {
    ?>

        <table border="1">
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
            $foto = isset($produto['foto']) ? $produto['foto'] : ""; // garante que a chave existe

            echo "<tr>";
            echo "<td>$idprodutos</td>";

            if ($foto != "") {
                echo "<td><img src='fotos/$foto' width='80'></td>";
            } else {
                echo "<td>Sem foto</td>";
            }

            echo "<td>$nome_produto</td>";
            echo "<td>$preco_venda</td>";
            echo "<td>$nome_categoria</td>";
            echo "<td><a href='formprodutos.php?id=$idprodutos'>Editar</a></td>";
            echo "<td><a href='deletarprodutos.php?id=$idprodutos'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
        </table>


<?php } ?>
    
    <br>
    <a href="home.php">SAIR</a>
    <br><br>
</body>

</html>