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

    <h2>PROMOÇÕES</h2>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";


    $lista_promocao = listarpromocao($conexao);

    if (count($lista_promocao) == 0) {
        echo "Não existe promoção";
    } else {        
    ?>    
    <table border="1">
        <tr>
            <td>ID</td>
            <td>DATA INÍCIO</td>
            <td>DATA FINAL</td>
            <td>VALOR</td>
            <td>PRODUTO</td>
            <td colspan="2">AÇÕES</td>

        </tr>
        
     <?php
        foreach ($lista_promocao as $promocao) {
            $idpromocao = $promocao['idpromocao'];
            $datainicio = $promocao['datainicio'];
            $datafinal = $promocao['datafinal'];
            $valor = $promocao['valor'];
            $nome_produtos = $promocao['nome_produtos'];
            
        
            echo "<tr>";
            echo "<td>$idpromocao</td>";
            echo "<td>$datainicio</td>";
            echo "<td>$datafinal</td>";
            echo "<td>$valor</td>";
            echo "<td>$nome_produtos</td>";

            echo "<td><a href='formpromocao.php?id=$idpromocao'>Editar</a></td>";
            echo "<td><a href='deletarpromocao.php?id=$idpromocao'>Excluir</a></td>";
            echo "</tr>";
        }
    }
     
    
        ?>
        </table>
        </body>

</html>
