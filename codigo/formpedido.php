<?php
require_once "verificarlogado.php";

if(isset($_GET['id'])) {
    require_once "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_pedidos WHERE idpedido = $id";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);

    $valor = $linha['valor'];
    $data = $linha['data'];
    $pagamento = $linha['pagamento'];
    $entrega = $linha['entrega'];

    $botao = "atualizar";
} else {
    $id = 0;
    $valor = "";
    $data = "";
    $pagamento = "";
    $entrega = "";

    $botao = "cadastrar";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formpedido</title>
</head>
<body>
    <h1>CADASTRAR PEDIDOS</h1>
    <form action="salvarpedido.php?id=<?php echo $id; ?>" method ="post">
        VALOR:<br>
        <input type="text" name="valor" value="<?php echo $valor; ?>"><br><br>
        DATA:<br>
        <input type="date" name="data" value="<?php echo $data; ?>"><br><br>
        FORMA DE PAGAMENTO:<br>
        <input type="text" name="pagamento" value="<?php echo $pagamento; ?>"><br><br>
        LOCAL DE ENTREGA:<br>
        <input type="text" name="entrega" value="<?php echo $entrega; ?>"><br><br>

        <input type="submit" value="<?php echo $botao; ?>">
    </form>
</body>
</html>
