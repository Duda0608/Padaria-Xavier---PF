<?php
require_once "verificarlogado.php";

if (isset($_GET['id'])) {
    require_once "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_categorias WHERE idcategoria = $id";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);

    $descricao = $linha['descricao'];
    $nome = $linha['nome'];
    $botao = "Atualizar";
} else {
    $id = 0;
    $descricao = "";
    $nome = "";
    $botao = "Cadastrar";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
</head>

<body class="corpocate">
    <div class="cartaocate">
        <h2 class="titulocate">Categoria</h2>
        <p class="subtitulocate">Preencha as informações abaixo</p>

        <form action="salvarcategoria.php?id=<?php echo $id; ?>" method="post">
            <div class="mb-3">
                <label for="nome" class="formcate">NOME</label>
                <input type="text" class="form-control controlcate" id="nome" name="nome"
                    value="<?php echo htmlspecialchars($nome); ?>" placeholder="Nome da categoria" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="formcate">DESCRIÇÃO</label>
                <input type="text" class="form-control controlcate" id="descricao" name="descricao"
                    value="<?php echo htmlspecialchars($descricao); ?>" placeholder="Descrição da categoria" required>
            </div>

            <button type="submit" class="btn botaocate"><?php echo $botao; ?></button>
        </form>

        <footer class="subinfo">Sistema de Acesso Seguro</footer>
    </div>
</body>

</html>