<?php
require_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Comentário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
</head>

<body class="corpocoment">
    <div class="cartacoment">
        <h2 class="titulocoment">Adicionar Comentário</h2>
        <p class="subtitulocoment">Preencha as informações abaixo</p>

        <form method="POST" action="salvarcomentario.php">
            <div class="mb-3 text-start">
                <label for="email" class="formcoment">E-MAIL</label>
                <input type="email" class="form-control controlcoment" id="email" name="email" placeholder="seu@email.com" required>
            </div>

            <div class="mb-3 text-start">
                <label for="senha" class="formcoment">SENHA</label>
                <input type="password" class="form-control controlcoment" id="senha" name="senha" placeholder="********" required>
            </div>

            <div class="mb-3 text-start">
                <label for="comentario" class="formcoment">COMENTÁRIO</label>
                <input type="text" class="form-control controlcoment" id="comentario" name="comentario" placeholder="Escreva aqui" required>
            </div>

            <button type="submit" class="btn botaocoment">Salvar Comentário</button>
        </form>

        <a href="home.php" class="linkcoment">Voltar</a>
        <footer class="subinfocoment">Sistema de Comentários</footer>
    </div>
</body>
</html>