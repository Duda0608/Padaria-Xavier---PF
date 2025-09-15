<?php
<<<<<<< Updated upstream

require_once "verificarlogado.php";

?>

=======
if (isset($_GET['id'])) {
    echo "editar";

    require_once "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_categorias WHERE idcategoria = $id";

    $resultado = mysqli_query($conexao,$sql);

    $linha = mysqli_fetch_array($resultado);


    $nome = $linha['nome'];
    $descricao = $linha['descricao'];

    $botao = "atualizar";
} else {
    $id = 0;
    $nome = "";
    $descricao = "";

    $botao = "cadastrar";

}

?>
>>>>>>> Stashed changes
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>cadastrar categoria</h1>
    <form action="salvarcategoria.php?id=<?php echo $id; ?>" method="post">
        Nome: <br>
        <input type="text" name="nome" value="<?php echo $nome; ?>"> <br><br>

        descricao:<br>
        <input type="text" name="descricao" value="<?php echo $descricao; ?>"> <br><br>

        <input type="submit" value="<?php echo $botao; ?>">


    </form>
</body>
</html>