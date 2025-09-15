<?php
require_once "verificarlogado.php";

if(isset($_GET['id'])) {
    
    require_once "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_produtos WHERE idprodutos = $id";

    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultado);

    $nome = $linha['nome'];
    $tipo = $linha['tipo'];
    $preco_venda = $linha['preco_venda'];
    $tbcategoria_idcategoria = $linha['tbcategoria_idcategoria'];



    $botao = "atualizar";
} else {
    $id = 0;
    $nome = "";
    $tipo = "";
    $preco_venda = "";

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
        <input type="text" name="nome" value="<?php echo $nome; ?>"><br><br>
        tipo:<br>
        <input type="text" name="tipo" value="<?php echo $tipo; ?>"><br><br>
        preco venda:<br>
        <input type="text" name="preco_venda" value="<?php echo $preco_venda; ?>"><br><br>

        <?php
        require_once "conexao.php";
// Consulta as categorias
$categorias = mysqli_query($conexao, "SELECT idcategoria, nome FROM tb_categorias");
?>
categoria:<br>
<select name="tbcategoria_idcategoria">
    <option value="">Selecione uma categoria</option>
    <?php while ($cat = mysqli_fetch_assoc($categorias)) { ?>
        <option value="<?php echo $cat['idcategoria']; ?>"
            <?php if ($cat['idcategoria'] == $tbcategoria_idcategoria) echo 'selected'; ?>>
            <?php echo htmlspecialchars($cat['nome']); ?>
        </option>
    <?php } ?>
</select><br><br>

        

        <input type="submit" value="<?php echo $botao; ?>">
    </form>
</body>
</html>