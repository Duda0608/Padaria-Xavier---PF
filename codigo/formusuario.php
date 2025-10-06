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

<body >
 
        
  
    <div class="bordaform">
    <h1 class="cabecalho">Acesso ao sistema</h1>


    <form class="form" id="formusuario" action="salvarusuario.php?id=<?php echo $id; ?>" method="post" class="cadastrar">
        
            <div><label for="nome" class="nome"></label>
        Nome:<br>
                <input name="nome" type="text" placeholder="informe seu nome" aria-label="Disabled input example" > <br>
        Cpf:<br>
                <input name="cpf" type="text" placeholder="informe seu cpf" aria-label="Disabled input example" > <br>
        Telefone:<br>
                <input name="telefone" type="text" placeholder="informe seu telefone" aria-label="Disabled input example" > <br>
        Endereço:<br>
                <input name="endereco" type="text" placeholder="informe seu endereco" aria-label="Disabled input example" > <br>
        Email:<br>
                <input name="email" type="text" placeholder="informe seu email" aria-label="Disabled input example" > <br>
        Senha:<br>
                <input name="senha" type="text" placeholder="informe sua senha" aria-label="Disabled input example" > <br><br>

                <button class="butao" type="submit" class="btn"  data-bs-toggle="button">cadastrar</button>    
</form>
    </div>

    
</body>





</html>