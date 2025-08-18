<?php
require_once "conexao.php";
require_once "funcoes.php";

$lista = listarusuario($conexao);
?>

<h2>Usuários</h2>

<table border="1" cellpadding ="5">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Email</th>
        <th>Senha</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($lista as $usuario) { ?>
        <tr>
            <form action="editarUsuario.php" method="post">
                <td><?php echo $usuario["idusuario"]; ?></td>
                <td><input type="text" name="nome" value="<?php echo $usuario["nome"]; ?>"></td>
                <td><input type="text" name="cpf" value="<?php echo $usuario["cpf"]; ?>"></td>
                <td><input type="text" name="telefone" value="<?php echo $usuario["telefone"]; ?>"></td>
                <td><input type="text" name="endereco" value="<?php echo $usuario["endereco"]; ?>"></td>
                <td><input type="text" name="email" value="<?php echo $usuario["email"]; ?>"></td>
                <td><input type="text" name="senha" value="<?php echo $usuario["senha"]; ?>"></td>
                <td>
                    <input type="hidden" name="idusuario" value="<?php echo $usuario["idusuario"]; ?>">
                    <button type="submit">Editar</button>
            </form>
            <form action="deletarUsuario.php" method="post" style="display:inline;">
                <input type="hidden" name="idusuario" value="<?php echo $usuario["idusuario"]; ?>">
                <button type="submit">Excluir</button>
            </form>
                </td>
        </tr>
    <?php } ?>
</table>
