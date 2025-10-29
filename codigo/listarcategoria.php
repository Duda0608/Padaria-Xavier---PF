<?php
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";
$lista = listarcategoria($conexao);
?>

<h2>CATEGORIAS</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>DESCRIÇÃO</th>
        <th>NOME</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach ($lista as $categoria) {
        $idcategoria = $categoria['idcategoria'];
            $descricao = $categoria['descricao'];
            $nome = $categoria['nome'];
           
            echo "<tr>";
            echo "<td>$idcategoria</td>";
            echo "<td>$descricao</td>";
            echo "<td>$nome</td>";
            echo "<td><a href='formcategoria.php?id=$idcategoria'>Editar</a></td>";
            echo "<td><a href='deletarcategoria.php?id=$idcategoria'>Excluir</a></td>";
            echo "</tr>";
        }
    
    
        ?>
        </table>
        </body>

</html>
   
