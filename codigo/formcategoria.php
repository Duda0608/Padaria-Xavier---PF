<?php

require_once "verificarlogado.php";

if (isset($_GET['id'])) {
    require_once "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_categorias WHERE idcategoria = $id";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);

    $nome = $linha['nome'];
    $descricao = $linha['descricao'];
    $botao = "Atualizar";
} else {
    $id = 0;
    $nome = "";
    $descricao = "";
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
<body>
    <div class="card card-custom mx-auto">
        <div class="card-body">
            <h2 class="card-title">Categoria</h2>
            <div class="card-subtitle mb-2">Preencha as informações abaixo</div>
            <form action="salvarcategoria.php?id=<?php echo $id; ?>" method="post">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo htmlspecialchars($descricao); ?>" required>
                </div>
                <button type="submit" class="btn btn-custom"><?php echo $botao; ?></button>
            </form>
        </div>
    </div>
</body>
</html>