<?php
require_once "verificarlogado.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido em Preparo - Panificadora Xavier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
</head>

<body class="body-processar">

    <div class="container text-center my-5">
        <div class="card card-processar shadow-lg border-0 mx-auto p-5">
            <h2 class="titulo-processar mb-3">Pedido em Preparo</h2>
            <p class="texto-processar mb-4">Seu pedido foi recebido e está sendo preparado com todo o carinho pela equipe da Panificadora Xavier.</p>
            <div class="icone-processar mb-4">
                <img src="https://cdn-icons-png.flaticon.com/512/992/992700.png" alt="Ampulheta" width="100">
            </div>
            <a href="home.php" class="btn btn-voltar">Voltar à Página Inicial</a>
        </div>
    </div>

</body>

</html>