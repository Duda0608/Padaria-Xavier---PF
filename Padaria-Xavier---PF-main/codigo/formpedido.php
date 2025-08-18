<?php

if(isset($_GET['id'])) {
    
    require_once "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT *FROM tb_pedidos WHERE idpedido = $id";

    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultado);

    $valor = $linha['valor'];
    $data = $linha['data'];
    $avaliacao = $linha['avaliacao'];
    $pagamento = $linha['pagamento'];
    $entrega = $linha['entrega'];
    $status = $linha['status'];

    $botao = "atualizar";
} else {
    $id = 0;
    $valor = "";
    $data = "";
    $avaliacao = "";
    $pagamento = "";
    $entrega = "";
    $status = "";

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
    <h1>Cadastro de pedidos</h1>
    <form action="salvarpedido.php?id=<?php echo $id; ?>" method ="post">
        Valor:<br>
        <input type="text" name="valor" value="<?php echo $valor; ?>"><br><br>
        Data:<br>
        <input type="date" name="data" value="<?php echo $data; ?>"><br><br>
        Avaliação:<br>
        <input type="text" name="avaliacao" value="<?php echo $avaliacao; ?>"><br><br>
        Forma de pagamento:<br>
        <input type="text" name="pagamento" value="<?php echo $pagamento; ?>"><br><br>
        Forma entrega:<br>
        <input type="text" name="entrega" value="<?php echo $entrega; ?>"><br><br>
        Status:<br>
        <input type="text" name="status" value="<?php echo $status; ?>"><br><br>

        <input type="submit" value="<?php echo $botao; ?>">
    </form>
</body>
</html>