<?php
require_once "conexao.php";
require_once "funcoes.php";

$lista = listarcomentarios($conexao);
?>

<h2>Comentários</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Comentário</th>
        <th>ID Usuário</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($lista as $comentario) { ?>
        <tr>
            <form action="editarComentario.php" method="post">
                <td><?php echo $comentario["idcomentario"]; ?></td>
                <td><input type="text" name="comentario" value="<?php echo $comentario["comentario"]; ?>"></td>
                <td><?php echo $comentario["tb_usuario_idusuario"]; ?></td>
                <td>
                    <input type="hidden" name="idcomentario" value="<?php echo $comentario["idcomentario"]; ?>">
                    <button type="submit">Editar</button>
            </form>
            <form action="deletarComentario.php" method="post" style="display:inline;">
                <input type="hidden" name="idcomentario" value="<?php echo $comentario["idcomentario"]; ?>">
                <button type="submit">Excluir</button>
            </form>
                </td>
        </tr>
    <?php } ?>
</table>
