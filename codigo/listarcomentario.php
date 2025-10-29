<?php
// Verifica login
require_once "verificarlogado.php"; // já inicia sessão
require_once "conexao.php";
require_once "funcoes.php";

// Pego todos os comentários e junto o nome do usuário
$sql = "SELECT c.idcomentario, c.comentario, u.nome AS usuario_nome 
        FROM tb_comentarios c 
        JOIN tb_usuario u ON c.tb_usuario_idusuario = u.idusuario";
$resultado = mysqli_query($conexao, $sql);
?>

<h2>COMENTÁRIOS</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>USUÁRIO</th>
        <th>COMENTÁRIO</th>
        <th>AÇÕES</th>
    </tr>

<?php
// Percorre cada comentário
while ($comentario = mysqli_fetch_assoc($resultado)) {
?>
    <tr>
        <?php
        // Mostra o ID
        ?>
        <td><?php echo $comentario['idcomentario']; ?></td>

        <?php
        // Mostra o nome do usuário
        ?>
        <td><?php echo htmlspecialchars($comentario['usuario_nome']); ?></td>

        <?php
        // Mostra o comentário
        ?>
        <td><?php echo htmlspecialchars($comentario['comentario']); ?></td>

        <td>
            <?php
            // Formulário para editar
            ?>
            <form action="editarComentario.php" method="post" style="display:inline;">
                <input type="hidden" name="idcomentario" value="<?php echo $comentario['idcomentario']; ?>">
                <input type="text" name="comentario" value="<?php echo htmlspecialchars($comentario['comentario']); ?>">
                <button type="submit">Editar</button>
            </form>

            <?php
            // Formulário para deletar
            ?>
            <form action="deletarComentario.php" method="post" style="display:inline;">
                <input type="hidden" name="idcomentario" value="<?php echo $comentario['idcomentario']; ?>">
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este comentário?');">Excluir</button>
            </form>
        </td>
    </tr>
<?php
} 
?>

</table>

<br>
<?php
// Link para adicionar novo comentário
?>
<a href="formcomentario.php">Adicionar novo comentário</a>