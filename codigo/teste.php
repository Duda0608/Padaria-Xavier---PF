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
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #2E4A2B;
            color: #E8DCC0;
            margin: 0;
            padding: 0;
        }

        .container {
            height: 100vh;
        }

        .left-side {
            background: url('padaria.jpg') center center/cover no-repeat;
        }

        .right-side {
            background-color: #2E4A2B;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .formusu {
            width: 80%;
            max-width: 400px;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            text-align: center;
            margin-bottom: 2rem;
            color: #E8DCC0;
        }

        label {
            font-size: 0.9rem;
            color: #E8DCC0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-control {
            background-color: transparent;
            border: 2px solid #E8DCC0;
            border-radius: 50px;
            color: #fff;
            padding: 10px 20px;
        }

        .form-control:focus {
            background-color: transparent;
            border-color: #C4A574;
            box-shadow: none;
            color: #fff;
        }

        .btn-custom {
            background-color: transparent;
            border: 2px solid #E8DCC0;
            border-radius: 50px;
            color: #E8DCC0;
            width: 100%;
            padding: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #C4A574;
            color: #2E4A2B;
        }

        .row .col-md-6 {
            padding-right: 5px;
            padding-left: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row h-100">
            <div class="col-md-6 left-side d-none d-md-block"></div>
            <div class="col-md-6 right-side">
                <div class="formusu">
                    <h2>Cadastre-se</h2>
                    <form id="formusuario" method="post" action="salvarusuario.php"> <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="mb-3"> <label for="nome">Nome:</label> <input type="text" class="form-control" id="nome" name="nome" value="<?= $nome ?>"> </div>
                        <div class="row mb-3">
                            <div class="col-md-6"> <label for="cpf">CPF:</label> <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $cpf ?>"> </div>
                            <div class="col-md-6"> <label for="telefone">Telefone:</label> <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $telefone ?>"> </div>
                        </div>
                        <div class="mb-3"> <label for="email">Email:</label> <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>"> </div>
                        <div class="mb-3"> <label for="senha">Senha:</label> <input type="password" class="form-control" id="senha" name="senha" value="<?= $senha ?>"> </div> <button type="submit" class="btn btn-custom"><?= $botao ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../jquery-3.7.1.min.js"></script>
    <script src="../jquery.validate.min.js"></script>
</body>

</html>