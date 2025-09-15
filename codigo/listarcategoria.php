<?php
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";
$lista = listarcategoria($conexao);
?>

<h2>Categorias</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($lista as $categoria) { ?>
        <tr>
            <form action="formcategoria.php" method="post">
                <td><?php echo $categoria["idcategoria"]; ?></td>
                <td><input type="text" name="nome" value="<?php echo $categoria["nome"]; ?>"></td>
                <td><input type="text" name="descricao" value="<?php echo $categoria["descricao"]; ?>"></td>
                <td>
                    <input type="hidden" name="idcategoria" value="<?php echo $categoria["idcategoria"]; ?>">
                    <button type="submit">Editar</button>
            </form>
            <form action="deletarcategoria.php" method="get" style="display:inline;">
                <input type="hidden" name="idcategoria" value="<?php echo $categoria["idcategoria"]; ?>">
                <button type="submit">Excluir</button>
            </form>
                </td>
        </tr>
    <?php } ?>
</table>
