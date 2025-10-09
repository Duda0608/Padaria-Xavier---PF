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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #2E4A2B;
            font-family: 'Inter', sans-serif;
            color: #e8dcc0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background-color: #355a33;
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            padding: 2rem;
            width: 100%;
            max-width: 420px;
        }

        .card h2 {
            font-family: 'Playfair Display', serif;
            color: #e8dcc0;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .card p {
            text-align: center;
            color: #d4c5a9;
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: #e8dcc0;
            font-weight: 500;
        }

        .form-control {
            background-color: transparent;
            border: 1px solid #d4c5a9;
            color: #e8dcc0;
        }

        .form-control::placeholder {
            color: #d1d1d1;
        }

        .form-control:focus {
            border-color: #c4a574;
            box-shadow: none;
        }

        .btn-custom {
            background-color: #c4a574;
            color: #2E4A2B;
            font-weight: 600;
            border: none;
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #d4c5a9;
        }

        .link {
            color: #d1d1d1;
            text-align: center;
            display: block;
            margin-top: 1rem;
            text-decoration: none;
        }

        .link:hover {
            color: #c4a574;
        }

        footer {
            text-align: center;
            color: #d1d1d1;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Bem-vindo</h2>
        <p>Entre com suas informações pessoais</p>
        <form id="formusuario" action="salvarusuario.php?id=<?= $id ?>" method="post">
            <div class="mb-3"> <label for="nome" class="form-label">NOME</label> <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome completo" value="<?= $nome ?>"> </div>
            <div class="mb-3"> <label for="cpf" class="form-label">CPF</label> <input type="text" class="form-control" id="cpf" name="cpf" placeholder="00000000000" value="<?= $cpf ?>"> </div>
            <div class="mb-3"> <label for="telefone" class="form-label">TELEFONE</label> <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" value="<?= $telefone ?>"> </div>
            <div class="mb-3"> <label for="endereco" class="form-label">ENDEREÇO</label> <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, número, bairro" value="<?= $endereco ?>"> </div>
            <div class="mb-3"> <label for="email" class="form-label">E-MAIL</label> <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" value="<?= $email ?>"> </div>
            <div class="mb-3"> <label for="senha" class="form-label">SENHA</label> <input type="password" class="form-control" id="senha" name="senha" placeholder="********" value="<?= $senha ?>"> </div> <a href="#" class="link">Não tem conta? Cadastre-se aqui</a> <button type="submit" class="btn btn-custom mt-3"><?= $botao ?></button>
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