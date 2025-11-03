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
    <title>Comentários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">LISTA DE COMENTÁRIOS</h1>

        <?php if (mysqli_num_rows($resultado) == 0) : ?>
            <p>Não existe comentários</p>
        <?php else : ?>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>USUÁRIO</th>
                        <th>COMENTÁRIO</th>
                        <th colspan="2">AÇÃO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($comentario = mysqli_fetch_assoc($resultado)) : 
                        $idcomentario = $comentario['idcomentario'];
                        $usuario_nome = htmlspecialchars($comentario['usuario_nome']);
                        $texto = htmlspecialchars($comentario['comentario']);
                    ?>
                    <tr>
                        <td><?php echo $idcomentario; ?></td>
                        <td><?php echo $usuario_nome; ?></td>
                        <td>
                            <form action="editarComentario.php" method="post" class="d-flex">
                                <input type="hidden" name="idcomentario" value="<?php echo $idcomentario; ?>">
                                <input type="text" name="comentario" value="<?php echo $texto; ?>" class="form-control me-2" required>
                                <button type="submit" class="btn btn-primary btn-sm">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="deletarComentario.php" method="post">
                                <input type="hidden" name="idcomentario" value="<?php echo $idcomentario; ?>">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este comentário?');">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <h2 class="mt-4">Adicionar novo comentário</h2>
        <form method="POST" action="salvarcomentario.php" class="d-flex mb-4">
            <input type="hidden" name="idcomentario" value="0">
            <input type="text" name="comentario" placeholder="Escreva aqui" class="form-control me-2" required>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>

        <a href="home.php" class="btn btn-secondary">Voltar para página inicial</a>
    </div>
</body>
</html>