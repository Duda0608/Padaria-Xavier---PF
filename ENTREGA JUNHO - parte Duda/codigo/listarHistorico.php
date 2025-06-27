<?php
require_once "conexao.php";
require_once "funcoes.php";

$lista = listarhistorico($conexao);
?>

<h2>Histórico</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID Pedido</th>
        <th>Nome</th>
        <th>Histórico</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($lista as $item) { ?>
        <tr>
            <form action="editarHistorico.php" method="post">
                <td><?php echo $item["idpedido"]; ?></td>
                <td><input type="text" name="nome" value="<?php echo $item["nome"]; ?>"></td>
                <td><input type="text" name="historico" value="<?php echo $item["historico"]; ?>"></td>
                <td>
                    <input type="hidden" name="idpedido" value="<?php echo $item["idpedido"]; ?>">
                    <button type="submit">Editar</button>
            </form>
            <form action="deletarHistorico.php" method="post" style="display:inline;">
                <input type="hidden" name="idpedido" value="<?php echo $item["idpedido"]; ?>">
                <button type="submit">Excluir</button>
            </form>
                </td>
        </tr>
    <?php } ?>
</table>
