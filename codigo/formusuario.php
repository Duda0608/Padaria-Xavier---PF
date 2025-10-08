<?php


if (isset($_GET['id'])) {

    require_once "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT *FROM tb_usuarios WHERE idusuario = $id";

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitcount+Prop+Double+Ink:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <script src="../jquery-3.7.1.min.js"></script>
    <script src="../jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
                    $("#formusuario").validate({
                        rules: {
                            nome: {
                                required: true,
                            },
                            cpf: {
                                required: true,
                                minlength: 11,
                                digits: true,
                            },
                            telefone: {
                                required: true,
                                minlength: 11,
                                digits: true,
                            },
                            endereco: {
                                required: true,
                            },
                            email: {
                                email: true,
                                required: true,
                            },
                            senha: {
                                required: true,
                            },
                        },
                        messages: {
                            nome: {
                                required: "Esse campo deve ser preenchido.",
                            },
                            cpf: {
                                required: "Informe seu CPF.",
                                minlength: "Está invalido a quantidade de números.",
                                digits: "Deves conter números."
                            },
                            telefone: {
                                required: "Informe de seu telefone para entrarmos em contato",
                                minlength: "Está invalido a quantidade de números.",
                                digits: "Deve conter apenas números.",
                            },
                            endereco: {
                                required: "Informe-nos de seu endereço caso seja entrega",
                            },
                            email: {
                                required: "Este campo deve informar um e-mail.",
                                email: "Deve ser e-mail."
                            },
                            senha: {
                                required: "É necessário uma senha para entrar",
                            },
                        }
                    })
                })
    </script>
    <style>
        .error {
            color: red;
        }
    </style>

</head>

<body class="corpousuario">
    <div class="logo"> <img src="logo.png" alt="Logo da Empresa"> </div>
        <div class="container">
            <div class="row h-100">
                <div class="col-md-6 imgesquerda d-none d-md-block"></div>
                    <div class="col-md-6 direita">
                    <div class="formusuario">
                        <h1>Criar Conta</h1>
                        <p>Preencha suas informações para se cadastrar</p>
                        <form id="formusuario" method="post" action="salvarusuario.php"> <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="mb-3"> <label for="nome">Nome:</label> <input type="text" class="campusu" id="nome" name="nome" value="<?= $nome ?>"> </div>
                            <div class="row mb-3">
                                <div class="col-md-6"> <label for="cpf">CPF:</label> <input type="text" class="campusu" id="cpf" name="cpf" value="<?= $cpf ?>"> </div>
                                <div class="col-md-6"> <label for="telefone">Telefone:</label> <input type="text" class="campusu" id="telefone" name="telefone" value="<?= $telefone ?>"> </div>
                            </div>
                            <div class="mb-3"> <label for="email">Email:</label> <input type="email" class="campusu" id="email" name="email" value="<?= $email ?>"> </div>
                            <div class="mb-3"> <label for="senha">Senha:</label> <input type="password" class="campusu" id="senha" name="senha" value="<?= $senha ?>"> </div> <button type="submit" class="botaousu"><?= $botao ?></button>
                        </form>
                        <div class="login-link"> Já tem uma conta? <a href="#">Entre aqui</a> </div>

                    </div>                
                </div>
            </div>
            <footer>Sistema de Acesso Seguro</footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../jquery-3.7.1.min.js"></script>
    <script src="../jquery.validate.min.js"></script>
</body>

</html>