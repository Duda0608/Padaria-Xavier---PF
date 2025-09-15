<?php
require_once "verificarlogado.php";

if(isset($_GET['id'])) {
    
    require_once "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT *FROM tb_produtos WHERE idprodutos = $id";

    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultado);

    $nome = $linha['nome'];
    $tipo = $linha['tipo'];
    $preco_venda = $linha['preco_venda'];
    $lucro = $linha['lucro'];
    $tb_promocao_idpromocao = $linha['tb_promocao_idpromocao'];
    $tbcategoria_idcategoria =$linha['tbcategoria_idcategoria'];


    $botao = "atualizar";
} else {
    $id = 0;
    $nome = "";
    $tipo = "";
    $preco_venda = "";
    $lucro = "";
    $tb_promocao_idpromocao = "";
    $tbcategoria_idcategoria = "";

        $botao = "cadastrar";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formprodutos</title>
</head>
<body>
    <h1>Cadastro de produtos</h1>
        <form action="salvarprodutos.php?id=<?php echo $id; ?>" method ="post">
        nome:<br>
        <input type="text" name="nome" value="<?php echo $tipo; ?>"><br><br>
        tipo:<br>
        <input type="text" name="tipo" value="<?php echo $nome; ?>"><br><br>
        preco venda:<br>
        <input type="text" name="preco_venda" value="<?php echo $preco_venda; ?>"><br><br>
        lucro:<br>
        <input type="text" name="lucro" value="<?php echo $lucro; ?>"><br><br>


        <input type="submit" value="<?php echo $botao; ?>">
    </form>
</body>
</html>