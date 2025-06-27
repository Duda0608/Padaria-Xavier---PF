<?php

function salvarpromocao ($conexao, $produto, $datainicio, $datafinal, $valor){
    $sql = "INSERT INTO tb_promocaos (produto, datainicio, datafinal, valor) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sssi', $produto, $datainicio, $datafinal, $valor);
    mysqli_stmt_execute($comando);
    $idpromocao = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);
    return $idpromocao;
};

function editarpromocao($conexao, $produto, $datainicio, $datafinal, $valor, $idpromocao){
    $sql = "UPDATE tb_promocaos SET produto=?, datainicio=?, datafinal=?, valor=? WHERE idpromocao=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sssii', $produto, $datainicio, $datafinal, $valor, $idpromocao);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};

function deletarpromocao($conexao, $idpromocao){
    $sql = "DELETE FROM tb_promocaos WHERE idpromocao=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idpromocao);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};

function listarpromocao($conexao){
    $sql = "SELECT * FROM tb_promocaos";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista = [];
    while ($item = mysqli_fetch_assoc($resultado)) {
        $lista[] = $item;
    }
    mysqli_stmt_close($comando);
    return $lista;
};

function salvarusuario ($conexao, $nome, $cpf, $telefone, $endereco, $email, $senha){
    $sql = "INSERT INTO tb_usuarios (nome, cpf, telefone, endereco, email, senha) VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssssss', $nome, $cpf, $telefone, $endereco, $email, $senha);
    mysqli_stmt_execute($comando);
    $idusuario = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);
    return $idusuario;
};

function listarusuario($conexao){
    $sql = "SELECT * FROM tb_usuarios";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista = [];
    while ($usuario = mysqli_fetch_assoc($resultado)) {
        $lista[] = $usuario;
    }
    mysqli_stmt_close($comando);
    return $lista;
};

function pesquisarusuario($conexao, $email, $senha){
    $sql = "SELECT * FROM tb_usuarios WHERE email=? AND senha=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ss', $email, $senha);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $usuario = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);
    return $usuario;
};

function salvarcategoria($conexao, $nome, $descricao){
    $sql = "INSERT INTO tb_categorias (nome, descricao) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ss', $nome, $descricao);
    mysqli_stmt_execute($comando);
    $idcategoria = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);
    return $idcategoria;
};

function listarcategoria($conexao){
    $sql = "SELECT * FROM tb_categorias";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista = [];
    while ($categoria = mysqli_fetch_assoc($resultado)) {
        $lista[] = $categoria;
    }
    mysqli_stmt_close($comando);
    return $lista;
};

function editarcategoria($conexao, $nome, $descricao, $idcategoria){
    $sql = "UPDATE tb_categorias SET nome=?, descricao=? WHERE idcategoria=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssi', $nome, $descricao, $idcategoria);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};

function deletarcategoria($conexao, $idcategoria){
    $sql = "DELETE FROM tb_categorias WHERE idcategoria=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idcategoria);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};

function pesquisarcategoriaid($conexao, $nome, $idcategoria){
    $sql = "SELECT * FROM tb_categorias WHERE nome=? AND idcategoria=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'si', $nome, $idcategoria);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $categoria = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);
    return $categoria;
};

function pesquisarcategorianome($conexao, $nome){
    $sql = "SELECT * FROM tb_categorias WHERE nome=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 's', $nome);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $categoria = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);
    return $categoria;
};

function listarcomentarios($conexao){
    $sql = "SELECT * FROM tb_comentarios";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista = [];
    while ($comentario = mysqli_fetch_assoc($resultado)) {
        $lista[] = $comentario;
    }
    mysqli_stmt_close($comando);
    return $lista;
}

function salvarcomentario ($conexao, $comentario, $idusuario){
    $sql = "INSERT INTO tb_comentarios (comentario, tb_usuario_idusuario) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'si', $comentario, $idusuario);
    mysqli_stmt_execute($comando);
    $idcomentario = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);
    return $idcomentario;
};

function editarcomentario($conexao, $comentario, $idcomentario){
    $sql = "UPDATE tb_comentarios SET comentario=? WHERE idcomentario=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'si', $comentario, $idcomentario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};

function deletarcomentario($conexao, $idcomentario){
    $sql = "DELETE FROM tb_comentarios WHERE idcomentario=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idcomentario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};
?>
