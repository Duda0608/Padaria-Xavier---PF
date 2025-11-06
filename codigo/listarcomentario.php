<?php
require_once "verificarlogado.php";
require_once "conexao.php";
require_once "funcoes.php";

// Pega todos os comentários com o nome do usuário
$sql = "SELECT c.idcomentario, c.comentario, u.nome AS usuario_nome 
        FROM tb_comentarios c 
        JOIN tb_usuarios u ON c.tb_usuario_idusuario = u.idusuario";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE COMENTÁRIOS</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="estilo.css">

<body>
    <h1>LISTA DE COMENTÁRIOS</h1>

    <?php
    if (mysqli_num_rows($resultado) == 0) {
        echo "Não existem comentários";
    } else {
    ?>
        <table class="table table-striped-columns" border="1">
            <tr>
                <td>ID</td>
                <td>USUÁRIO</td>
                <td>COMENTÁRIO</td>
                <td colspan="2">AÇÃO</td>
            </tr>

            <?php
            while ($comentario = mysqli_fetch_assoc($resultado)) {
                $idcomentario = $comentario['idcomentario'];
                $usuario_nome = htmlspecialchars($comentario['usuario_nome']);
                $texto = htmlspecialchars($comentario['comentario']);

                echo "<tr>";
                echo "<td>$idcomentario</td>";
                echo "<td>$usuario_nome</td>";
                echo "<td>$texto</td>";
                echo "<td><a href='formcomentario.php?id=$idcomentario'>EDITAR</a></td>";
                echo "<td><a href='deletarComentario.php?id=$idcomentario'>EXCLUIR</a></td>";
                echo "</tr>";
            }
        }
            ?>
        </table>

        <br>
        <a href="home.php">SAIR</a>
        <br><br>
</body>

</html>