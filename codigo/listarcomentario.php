<?php
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";

$lista = listarcomentarios($conexao);
?>

<h2>COMENTÁRIOS</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>COMENTÁRIO</th>
        <th>ID USUÁRIO</th>
        <th>AÇÕES</th>
    </tr>

    <?php foreach ($lista as $comentario) { ?>
        <tr>
            <!-- Formulário para editar -->
            <form action="editarComentario.php" method="post">
                <td><?php echo $comentario["idcomentario"]; ?></td>
                <td><input type="text" name="comentario" value="<?php echo htmlspecialchars($comentario["comentario"]); ?>"></td>
                <td><?php echo $comentario["tb_usuario_idusuario"]; ?></td>
                <td>
                    <input type="hidden" name="idcomentario" value="<?php echo $comentario["idcomentario"]; ?>">
                    <button type="submit">Editar</button>
            </form>

            <!-- Formulário para deletar -->
            <form action="deletarComentario.php" method="post" style="display:inline;">
                <input type="hidden" name="idcomentario" value="<?php echo $comentario["idcomentario"]; ?>">
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este comentário?');">Excluir</button>
            </form>
                </td>
        </tr>
    <?php } ?>
</table>
