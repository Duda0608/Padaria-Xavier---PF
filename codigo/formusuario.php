<?php if (isset($_GET['id'])) {
    require_once "conexao.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_usuarios WHERE idusuario = $id";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);
    $nome = $linha['nome'];
    $cpf = $linha['cpf'];
    $telefone = $linha['telefone'];
    $endereco = $linha['endereco'];
    $email = $linha['email'];
    $senha = $linha['senha'];
    $botao = "Atualizar";
} else {
    $id = 0;
    $nome = "";
    $cpf = "";
    $telefone = "";
    $endereco = "";
    $email = "";
    $senha = "";
    $botao = "Cadastrar";
} ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso ao Sistema</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">

</head>

<body class="corpousu">
    <div class="cartaousu">
        <h2>Bem-vindo</h2>
        <p>Entre com suas informações pessoais</p>
        <form id="formusuario" action="salvarusuario.php?id=<?= $id ?>" method="post">
            <div class="mb-3"> <label for="nome" class="formusu">NOME</label> <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome completo" value="<?= $nome ?>"> </div>
            <div class="mb-3"> <label for="cpf" class="formusu">CPF</label> <input type="text" class="form-control" id="cpf" name="cpf" placeholder="00000000000" value="<?= $cpf ?>"> </div>
            <div class="mb-3"> <label for="telefone" class="formusu">TELEFONE</label> <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" value="<?= $telefone ?>"> </div>
            <div class="mb-3"> <label for="endereco" class="formusu">ENDEREÇO</label> <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, número, bairro" value="<?= $endereco ?>"> </div>
            <div class="mb-3"> <label for="email" class="formusu">E-MAIL</label> <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" value="<?= $email ?>"> </div>
            <div class="mb-3"> <label for="senha" class="formusu">SENHA</label> <input type="password" class="form-control" id="senha" name="senha" placeholder="********" value="<?= $senha ?>"> </div> <a href="#" class="link">Ja tem conta? Entre aqui</a>
            <button type="submit" class="btn-custom"><?= $botao ?></button>
        </form>
        <footer>Sistema de Acesso Seguro</footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#formusuario").validate({
                rules: {
                    nome: {
                        required: true
                    },
                    cpf: {
                        required: true,
                        minlength: 11,
                        digits: true
                    },
                    telefone: {
                        required: true,
                        minlength: 11,
                        digits: true
                    },
                    endereco: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    senha: {
                        required: true
                    }
                },
                messages: {
                    nome: {
                        required: "Esse campo deve ser preenchido."
                    },
                    cpf: {
                        required: "Informe seu CPF.",
                        minlength: "Quantidade inválida de números.",
                        digits: "Apenas números."
                    },
                    telefone: {
                        required: "Informe seu telefone.",
                        minlength: "Quantidade inválida de números.",
                        digits: "Apenas números."
                    },
                    endereco: {
                        required: "Informe seu endereço."
                    },
                    email: {
                        required: "Informe seu e-mail.",
                        email: "E-mail inválido."
                    },
                    senha: {
                        required: "Informe uma senha."
                    }
                }
            });
        });
    </script>
</body>

</html>