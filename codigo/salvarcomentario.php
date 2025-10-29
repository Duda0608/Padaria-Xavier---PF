<?php
// Não preciso de session_start() aqui, verificarlogado.php já faz
require_once "verificarlogado.php"; // já verifica login
require_once "conexao.php";
require_once "funcoes.php";

// Pega o comentário que o usuário digitou
$comentario = $_POST['comentario'];

// Pego o id do usuário logado da sessão
if (isset($_SESSION['idusuario'])) {
    $idusuario = $_SESSION['idusuario']; // id do usuário logado
} else {
    // Se por algum motivo não tiver, mostra erro e para
    die("Erro: usuário não identificado. Faça login novamente.");
}

// SQL para salvar o comentário no banco
$sql = "INSERT INTO tb_comentarios (comentario, tb_usuario_idusuario) VALUES (?, ?)";
$stmt = mysqli_prepare($conexao, $sql);

// Associo os valores do comentário e do usuário
mysqli_stmt_bind_param($stmt, "si", $comentario, $idusuario);

// Tenta executar e vê se deu certo
if (mysqli_stmt_execute($stmt)) {
    // Tudo certo, salvo comentário
    echo "Comentário salvo com sucesso!";
} else {
    // Deu algum erro
    echo "Erro ao salvar comentário.";
}

// Fecha a conexão
mysqli_stmt_close($stmt);
mysqli_close($conexao);

// Link para voltar para o formulário
echo "<br><a href='formcomentario.php'>Voltar</a>";
?>