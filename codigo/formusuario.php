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
</head>
<body>
    <h1>Acesso ao sistemaaaaaaa</h1>

    <form action="salvarusuario.php?id=<?php echo $id; ?>" method="post">
        Nome:<br>
        <input type="text" name="nome" value="<?php echo $nome; ?>"><br>
        Cpf:<br>
        <input type="text" name="cpf" value="<?php echo $cpf; ?>"><br>
        Telefone:<br>
        <input type="text" name="telefone" value="<?php echo $telefone; ?>"><br>
        Endereço:<br>
        <input type="text" name="endereco" value="<?php echo $endereco; ?>"><br>
        Email:<br>
        <input type="text" name="email" value="<?php echo $email; ?>"><br>
        Senha:<br>
        <input type="password" name="senha" value="<?php echo $senha; ?>"><br><br>

        <input type="submit" value="<?php echo $botao; ?>">
        
    </form>
</body>
</html>

