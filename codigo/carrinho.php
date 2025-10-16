<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho</title>
    <script src="jquery-3.7.1.min.js"></script>
</head>
<body>
    <h2>Seu Carrinho</h2>

    <?php
    if (empty($_SESSION['carrinho'])) {
        echo "Carrinho vazio";
    } else {
        $total = 0;
        echo "<table border='1'>";
        echo "<tr><th>Produto</th><th>Preço</th><th>Quantidade</th><th>Total</th><th>Remover</th></tr>";

        foreach ($_SESSION['carrinho'] as $id => $quantidade) {
            $produto = pesquisarprodutosid($conexao, $id);
            $preco = $produto['preco_venda'];
            $nome = $produto['nome'];
            $total_unitario = $preco * $quantidade;
            $total += $total_unitario;

            echo "<tr>";
            echo "<td>$nome</td>";
            echo "<td>R$ <span class='preco_venda'>$preco</span></td>";
            echo "<td><input type='number' value='$quantidade' data-id='$id' class='quantidade' min='1'></td>";
            echo "<td>R$ <span class='total_unitario'>$total_unitario</span></td>";
            echo "<td><a href='remover.php?id=$id'>[Remover]</a></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<h3>Total da compra: R$ <span id='total'>$total</span></h3>";
    }
    ?>

    <p>
        <a href="index.php">[Continuar comprando]</a><br>
        <a href="gravar.php">[Finalizar compra]</a>
    </p>

    <script>
        function atualizar_total() {
            let total = 0;
            $('span.total_unitario').each(function() {
                total += parseFloat($(this).text());
            });
            $('#total').text(total);
        }

        function somar() {
            const linha = $(this).closest('tr');
            const preco_unitario = parseFloat(linha.find('span.preco_venda').text());
            const quantidade = parseInt($(this).val());
            const id = $(this).data('id');

            const total = preco_unitario * quantidade;
            linha.find('span.total_unitario').text(total);
            atualizar_total();

            const dados = new URLSearchParams();
            dados.append('id', id);
            dados.append('quantidade', quantidade);

            fetch('atualiza_carrinho.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: dados.toString()
            });
        }

        $("input[type='number']").change(somar);
    </script>
</body>
</html>