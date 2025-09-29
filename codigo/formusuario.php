<?php


if(isset($_GET['id'])) {
    
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
    <script src="../jquery-3.7.1.min.js"></script>
    <script src="../jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
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
                            required: true,
                        },
                        senha: {
                            required: true,
                        },

                    messages: {
                        nome: {
                            required: "Esse campo deve ser preenchido"
                        },
                        cpf: {
                            required: "Informe seu CPF"
                        },
                        telefone: {
                            required: "Nos informe de seu telefone para entrarmos em contato"
                        },
                        endereco: {
                            required: "Informe-nos de seu endereço caso seja entrega"
                        },
                        email: {
                            required: "Este campo dever ser preenchido"
                        },
                        senha: {
                            required: "É necessário uma senha para entrar"
                        },
                    }
                }
            })
        });
</script>
<style>
    .error {
        color: red;
    }
</style>
             
</head>
<body>
    <h1>Acesso ao sistema</h1>

    <form id="formusuario" action="salvarusuario.php?id=<?php echo $id; ?>" method="post">
        Nome:<br>
        <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>"><br>
        Cpf:<br>
        <input type="text" name="cpf" id="cpf" value="<?php echo $cpf; ?>"><br>
        Telefone:<br>
        <input type="text" name="telefone" id="telefone" value="<?php echo $telefone; ?>"><br>
        Endereço:<br>
        <input type="text" name="endereco" id="endereco" value="<?php echo $endereco; ?>"><br>
        Email:<br>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>"><br>
        Senha:<br>
        <input type="password" name="senha" id="senha" value="<?php echo $senha; ?>"><br><br>

        <input type="submit" value="<?php echo $botao; ?>">
        
    </form>
</body>
</html>

