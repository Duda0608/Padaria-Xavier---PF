<?php
require_once "conexao.php";
require_once "funcoes.php";
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
</head>
<body>
    <h2>Produtos disponíveis</h2>

    <a href="destruir_carrinho.php">[Esvaziar Carrinho]</a><br>
    <a href="carrinho.php">[Ver Carrinho]</a><br><br>

    <form action="adicionar.php" method="POST">
        <ul>
            <?php
            $produtos = listarprodutos($conexao);

            foreach ($produtos as $p):
                $id = $p['idprodutos'];
                $nome = $p['nome_produto'];
                $preco = $p['preco_venda'];
            ?>
                <li>
                    <input type="checkbox" name="idproduto[]" value="<?php echo $id; ?>">
                    R$ <?php echo $preco; ?> — <?php echo $nome; ?>
                    <input type="number" name="quantidade[<?php echo $id; ?>]" value="1" min="1">
                </li>
            <?php endforeach; ?>
        </ul>

        <input type="submit" value="Adicionar selecionados ao carrinho">
    </form>
</body>
</html>