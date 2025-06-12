<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lista de usuarios</h1>

    <?php
    require_once "conexao.php";

    $lista_usuarios = listarusuarios($conexao);

    if (count($lista_usuario) == 0) {
        echo "Não existe usuarios";
    } else {
    ?>
        <table border="1">
            <tr>
                <td>id</td>
                <td>nome</td>
                <td>cpf</td>
                <td>telefone</td>
                <td>endereco</td>
                <td>email</td>
                <td colspan="2">açao</td>
            </tr>

        <?php
        foreach ($lista_usuario as $usuario)
            $idusuario = $usuario['idusuario'];
            $nome = $usuario['nome'];
            $cpf = $usuario['cpf'];
            $telefone = $usuario['telefone'];
            $endereco = $usuario['endereco'];
            $email = $usuario['email'];

            echo "<tr";
            echo "<td>$idcliente</td>";
            echo "<td>$nome</td>";
            echo "<td>$cpf</td>";
            echo "<td>$telefone</td>";
            echo "<td>$endereco</td>";
            echo "<td>$email</td>";
            echo "<td><a href='formusuario.php?id=$idcliente'>Editar</a></td>";
            echo "<td><a href='deletarCliente.php?id=$idcliente'>Excluir</a></td>";
            echo "</tr>";
        }
    
        ?>
        </table>
        </body>

</html>
        


    