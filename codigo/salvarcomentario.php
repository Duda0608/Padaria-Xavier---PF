<?php
require_once "conexao.php";
require_once "funcoes.php";

// Pega os dados do formulário
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$comentario = $_POST['comentario'] ?? '';

// Busca o usuário no banco
$sql = "SELECT * FROM tb_usuarios WHERE email = ? LIMIT 1";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$usuario = mysqli_fetch_assoc($result);

// Verifica se usuário existe e a senha confere
if ($usuario && password_verify($senha, $usuario['senha'])) {
    $idusuario = $usuario['idusuario'];

    // Salva comentário
    $sql2 = "INSERT INTO tb_comentarios (comentario, tb_usuario_idusuario) VALUES (?, ?)";
    $stmt2 = mysqli_prepare($conexao, $sql2);
    mysqli_stmt_bind_param($stmt2, "si", $comentario, $idusuario);

    if (mysqli_stmt_execute($stmt2)) {
        // Redireciona para a listagem de comentários
        header("Location: listarcomentario.php");
        exit; // importante para parar o script
    } else {
        echo "Erro ao salvar comentário.";
    }

    mysqli_stmt_close($stmt2);
} else {
    echo "E-mail ou senha inválidos. Comentário não salvo.";
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);
?>