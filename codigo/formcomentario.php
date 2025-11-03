<?php
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Comentário</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body.corpousu {
            background-color: #2E4A2B;
            font-family: 'Inter', sans-serif;
        }

        .cartaousu {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            max-width: 500px;
            margin: 50px auto;
            border-radius: 20px;
            color: white;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .formusu {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            color: white;
        }

        .btn-custom {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .link {
            display: block;
            margin-top: 15px;
            color: #D1D1D1;
            text-decoration: none;
        }

        .link:hover {
            text-decoration: underline;
        }

        footer {
            margin-top: 20px;
            font-size: 0.8rem;
            color: #D1D1D1;
        }
    </style>
</head>

<body class="corpousu">
    <div class="cartaousu">
        <h2>ADICIONAR COMENTÁRIO</h2>
        <form method="POST" action="salvarcomentario.php">
            <div class="mb-3 text-start">
                <label for="email" class="formusu">E-MAIL:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required>
            </div>

            <div class="mb-3 text-start">
                <label for="senha" class="formusu">SENHA:</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="••••••••" required>
            </div>

            <div class="mb-3 text-start">
                <label for="comentario" class="formusu">COMENTÁRIO:</label>
                <input type="text" class="form-control" id="comentario" name="comentario" placeholder="Escreva aqui" required>
            </div>

            <button type="submit" class="btn-custom">Salvar Comentário</button>
        </form>
        <a href="home.php" class="link">Voltar</a>
        <footer>Sistema de Comentários</footer>
    </div>
</body>

</html>