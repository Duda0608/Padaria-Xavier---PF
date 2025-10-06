<?php
if (isset($_GET['id'])) {
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

    $botao = "atualizar";
} else {
    $id = 0;
    $nome = "";
    $cpf = "";
    $telefone = "";
    $endereco = "";
    $email = "";
    $senha = "";

    $botao = "Cadastrar";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitcount+Prop+Double+Ink:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#formusuario").validate({
                rules: {
                    nome: { required: true },
                    cpf: { required: true, minlength: 11, digits: true },
                    telefone: { required: true, minlength: 11, digits: true },
                    endereco: { required: true },
                    email: { email: true, required: true },
                    senha: { required: true },
                },
                messages: {
                    nome: { required: "Esse campo deve ser preenchido." },
                    cpf: {
                        required: "Informe seu CPF.",
                        minlength: "Está invalido a quantidade de números.",
                        digits: "Deve conter números."
                    },
                    telefone: {
                        required: "Informe seu telefone.",
                        minlength: "Está invalido a quantidade de números.",
                        digits: "Deve conter apenas números."
                    },
                    endereco: { required: "Informe seu endereço caso haja entrega." },
                    email: {
                        required: "Este campo deve informar um e-mail.",
                        email: "Deve ser um e-mail válido."
                    },
                    senha: { required: "É necessário uma senha para entrar." },
                }
            });
        });
    </script>
    <style>
        .error {
            color: red;
        }
        body {
            background-color: #f4f4f4;
            background-image: url('3.png');
            background-size: cover;
            background-position: center;
        }

        .bordaform {
            border: 2px solid #f1e0c6;
            padding: 20px;
            margin-top: 30px;
            border-radius: 15px;
            background-color: rgba(0, 0, 0, 0.6);
            color: #fff;
        }

        .cabecalho {
            text-align: center;
            font-family: 'Bitcount Prop Double Ink', sans-serif;
            margin-bottom: 20px;
            color: #fff;
        }

        .form label {
            font-weight: bold;
            color: #fff;
        }

        .form input {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 100%;
        }

        .butao {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            background-color: #a16e3f;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        .butao:hover {
            background-color: #7a4e2a;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <div class="bordaform">
            <h1 class="cabecalho">Acesso ao sistema</h1>
            <form id="formusuario" action="salvarusuario.php?id=<?php echo $id; ?>" method="post">
                <div>
                    <label for="nome">Nome:</label>
                    <input name="nome" type="text" placeholder="Informe seu nome" value="<?php echo $nome; ?>" required>
                </div>
                <div>
                    <label for="cpf">CPF:</label>
                    <input name="cpf" type="text" placeholder="Informe seu CPF" value="<?php echo $cpf; ?>" required>
                </div>
                <div>
                    <label for="telefone">Telefone:</label>
                    <input name="telefone" type="text" placeholder="Informe seu telefone" value="<?php echo $telefone; ?>" required>
                </div>
                <div>
                    <label for="endereco">Endereço:</label>
                    <input name="endereco" type="text" placeholder="Informe seu endereço" value="<?php echo $endereco; ?>" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input name="email" type="email" placeholder="Informe seu email" value="<?php echo $email; ?>" required>
                </div>
                <div>
                    <label for="senha">Senha:</label>
                    <input name="senha" type="password" placeholder="Informe sua senha" value="<?php echo $senha; ?>" required>
                </div>
                <button class="butao" type="submit"><?php echo $botao; ?></button>
            </form>
        </div>
    </div>
</body>

</html>
