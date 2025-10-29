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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">

<body>
    <h1>LISTA DE USUÁRIOS</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";


    $lista_usuario = listarusuario($conexao);
 

    if (count($lista_usuario) == 0) {
        echo "Não existe usuarios";
    } else {
    ?>
        <table class="table table-striped-columns" border="1">
            <tr>
                <td>ID</td>
                <td>NOME</td>
                <td>CPF</td>
                <td>TELEFONE</td>
                <td>ENDERECO</td>
                <td>EMAIL</td>
                <td colspan="2">AÇÃO</td>

            </tr>

        <?php
        foreach ($lista_usuario as $usuario) {
            $idusuario = $usuario['idusuario'];
            $nome = $usuario['nome'];
            $cpf = $usuario['cpf'];
            $telefone = $usuario['telefone'];
            $endereco = $usuario['endereco'];
            $email = $usuario['email'];

            echo "<tr>";
            echo "<td>$idusuario</td>";
            echo "<td>$nome</td>";
            echo "<td>$cpf</td>";
            echo "<td>$telefone</td>";
            echo "<td>$endereco</td>";
            echo "<td>$email</td>";

            echo "<td><a href='formusuario.php?id=$idusuario'>editar</a></td>";
            echo "<td><a href='deletarusuario.php?id=$idusuario'>excluir</a></td>";
            echo "</tr>";
        }
     
    }
        ?>
        </table>

    <a href="home.php">SAIR</a>
    <br><br>

        </body>

</html>
        


    