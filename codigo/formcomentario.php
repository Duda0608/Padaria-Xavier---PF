<?php
// Verifica se o usuário está logado antes de mostrar o formulário
require_once "verificarlogado.php";
?>

<h3>ADICIONAR COMENTÁRIO</h3>

<?php
// Aqui é o formulário simples para enviar o comentário
?>
<form method="POST" action="salvarcomentario.php">
    COMENTÁRIO: <input type="text" name="comentario"><br><br>
    <input type="submit" value="Salvar Comentário">
</form>

<br>
<?php
// Link para voltar para a página inicial
?>
<a href="home.php">VOLTAR</a>