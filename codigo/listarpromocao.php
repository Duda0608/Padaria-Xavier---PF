<?php

require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";

$lista = listarpromocao($conexao);
?>

<h2>Promoções</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Produto</th>
        <th>Data Início</th>
        <th>Data Final</th>
        <th>Valor</th>
        <th>Ações</th>
    </tr>
     <?php
        foreach ($lista as $promocao) {
            $idpromocao = $promocao['idpromocao'];
            $produto = $promocao['produto'];
            $datainicio = $promocao['datainicio'];
            $datafinal = $promocao['datafinal'];
            $valor = $usuario['valor'];
            
        
            echo "<tr>";
            echo "<td>$idpromocao</td>";
            echo "<td>$produto</td>";
            echo "<td>$datainicio</td>";
            echo "<td>$datafinal</td>";
            echo "<td>$valor</td>";

            echo "<td><a href='formpromocao.php?id=$idpromocao'>Editar</a></td>";
            echo "<td><a href='deletarpromocao.php?id=$idpromocao'>Excluir</a></td>";
            echo "</tr>";
        }
     
    
        ?>
        </table>
        </body>

</html>
