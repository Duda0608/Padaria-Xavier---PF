<?php require_once "verificarlogado.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso ao Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body class="corpobody">
    <div class="cardlogin">
        <h2 class="titulo">Bem-vindo</h2>
        <p class="subtitulo">Entre com suas informações pessoais</p>
        <form id="formusuario" action="salvarusuario.php?id=<?= $id ?>" method="post">
            <div class="mb-3"> <label for="nome" class="form-label">NOME</label> <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome completo" value="<?= $nome ?>"> </div>
            <div class="mb-3"> <label for="cpf" class="form-label">CPF</label> <input type="text" class="form-control" id="cpf" name="cpf" placeholder="00000000000" value="<?= $cpf ?>"> </div>
            <div class="mb-3"> <label for="telefone" class="form-label">TELEFONE</label> <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" value="<?= $telefone ?>"> </div>
            <div class="mb-3"> <label for="endereco" class="form-label">ENDEREÇO</label> <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, número, bairro" value="<?= $endereco ?>"> </div>
            <div class="mb-3"> <label for="email" class="form-label">E-MAIL</label> <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" value="<?= $email ?>"> </div>
            <div class="mb-3"> <label for="senha" class="form-label">SENHA</label> <input type="password" class="form-control" id="senha" name="senha" placeholder="********" value="<?= $senha ?>"> </div> <a href="#" class="link">Não tem conta? Cadastre-se aqui</a> <button type="submit" class="btn btn-custom mt-3"><?= $botao ?></button>
        </form>
        <footer class="footer">Sistema de Acesso Seguro</footer>
    </div>
</body>

</html>