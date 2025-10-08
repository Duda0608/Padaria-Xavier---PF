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


    $lista = listarpromocao($conexao);



<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>DATA INÍCIO</th>
        <th>DATA FINAL</th>
        <th>VALOR</th>
        <th>PRODUTO</th>
        <th>AÇÕES</th>
    </tr>
     <?php
        foreach ($lista as $promocao) {
            $idpromocao = $promocao['idpromocao'];
            $datainicio = $promocao['datainicio'];
            $datafinal = $promocao['datafinal'];
            $valor = $promocao['valor'];
            $tb_produtos_idprodutos = $promocao['tb_produtos_idprodutos'];
            
        
            echo "<tr>";
            echo "<td>$idpromocao</td>";
            echo "<td>$datainicio</td>";
            echo "<td>$datafinal</td>";
            echo "<td>$valor</td>";
            echo "<td>$tb_produtos_idprodutos</td>";

            echo "<td><a href='formpromocao.php?id=$idpromocao'>Editar</a></td>";
            echo "<td><a href='deletarpromocao.php?id=$idpromocao'>Excluir</a></td>";
            echo "</tr>";
        }
     
    
        ?>
        </table>
        </body>

</html>
