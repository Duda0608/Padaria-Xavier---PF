<?php

require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";

$lista = listarpromocao($conexao);
?>

<h2>Promoções</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Produto</th>
        <th>Data Início</th>
        <th>Data Final</th>
        <th>Valor</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($lista as $item) { ?>
        <tr>
            <form action="editarPromocao.php" method="post">
                <td><?php echo $item["idpromocao"]; ?></td>
                <td><input type="text" name="produto" value="<?php echo $item["produto"]; ?>"></td>
                <td><input type="date" name="datainicio" value="<?php echo $item["datainicio"]; ?>"></td>
                <td><input type="date" name="datafinal" value="<?php echo $item["datafinal"]; ?>"></td>
                <td><input type="number" name="valor" value="<?php echo $item["valor"]; ?>"></td>
                <td>
                    <input type="hidden" name="idpromocao" value="<?php echo $item["idpromocao"]; ?>">
                    <button type="submit">Editar</button>
            </form>
            <form action="deletarPromocao.php" method="post" style="display:inline;">
                <input type="hidden" name="idpromocao" value="<?php echo $item["idpromocao"]; ?>">
                <button type="submit">Excluir</button>
            </form>
                </td>
        </tr>
    <?php } ?>
</table>
