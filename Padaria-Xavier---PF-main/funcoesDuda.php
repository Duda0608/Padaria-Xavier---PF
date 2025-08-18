<?php

// ------------------------- PROMOCAO -------------------------

function salvarpromocao ($conexao, $produto, $datainicio, $datafinal, $valor){
    $sql = "INSERT INTO tb_promocao (produto, datainicio, datafinal, valor) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'sssd', $produto, $datainicio, $datafinal, $valor);
    mysqli_stmt_execute($comando);
    $idpromocao = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);

    return $idpromocao;
};

function editarpromocao($conexao, $produto, $datainicio, $datafinal, $valor, $idpromocao){
    $sql = "UPDATE tb_promocao SET produto=?, datainicio=?, datafinal=?, valor=? WHERE idpromocao=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'sssdi', $produto, $datainicio, $datafinal, $valor, $idpromocao);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

function deletarpromocao($conexao, $idpromocao){
    $sql = "DELETE FROM tb_promocao WHERE idpromocao=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idpromocao);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

function listarpromocao($conexao){
    $sql = "SELECT * FROM tb_promocao";
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


// ------------------------- LOGIN -------------------------

function salvarlogin ($conexao, $email, $senha){
    $sql = "INSERT INTO tb_login (email, senha) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ss', $email, $senha);
    mysqli_stmt_execute($comando);
    $idlogin = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);

    return $idlogin;
};

function listarlogin($conexao){
    $sql = "SELECT * FROM tb_login";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista = [];
    while ($login = mysqli_fetch_assoc($resultado)) {
        $lista[] = $login;
    }
    mysqli_stmt_close($comando);

    return $lista;
};

function pesquisarlogin($conexao, $gmail, $senha){
    $sql = "SELECT * FROM tb_login WHERE email=? AND senha=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ss', $gmail, $senha);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $login = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);

    return $login;
};


// ------------------------- CATEGORIA -------------------------

function salvarcategoria($conexao, $nome, $descricao){
    $sql = "INSERT INTO tb_categoria (nome, descricao) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ss', $nome, $descricao);
    mysqli_stmt_execute($comando);
    $idcategoria = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);

    return $idcategoria;
};

function listarcategoria($conexao){
    $sql = "SELECT * FROM tb_categoria";
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
    $sql = "UPDATE tb_categoria SET nome=?, descricao=? WHERE idcategoria=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssi', $nome, $descricao, $idcategoria);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

function deletarcategoria($conexao, $idcategoria){
    $sql = "DELETE FROM tb_categoria WHERE idcategoria=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idcategoria);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

function pesquisarcategoriaid($conexao, $nome, $idcategoria){
    $sql = "SELECT * FROM tb_categoria WHERE nome=? AND idcategoria=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'si', $nome, $idcategoria);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $categoria = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);

    return $categoria;
};

function pesquisarcategorianome($conexao, $nome){
    $sql = "SELECT * FROM tb_categoria WHERE nome=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 's', $nome);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $categoria = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);

    return $categoria;
};


// ------------------------- HISTORICO -------------------------

function salvarhistorico($conexao, $nome, $historico){
    $sql = "INSERT INTO tb_historico (nome, historico) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ss', $nome, $historico);
    mysqli_stmt_execute($comando);
    $idhistorico = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);

    return $idhistorico;
};

function listarhistorico($conexao){
    $sql = "SELECT * FROM tb_historico";
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

function deletarhistorico($conexao, $idpedido){
    $sql = "DELETE FROM tb_historico WHERE idpedido=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idpedido);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

function pesquisarhistoriconome($conexao, $nome){
    $sql = "SELECT * FROM tb_historico WHERE nome=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 's', $nome);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $historico = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);

    return $historico;
};


// ------------------------- COMENTARIO -------------------------

function salvarcomentario ($conexao, $nome, $comentario){
    $sql = "INSERT INTO tb_comentario (nome, comentario) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ss', $nome, $comentario);
    mysqli_stmt_execute($comando);
    $idcomentario = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);

    return $idcomentario;
};

function editarcomentario($conexao, $comentario, $idcomentario){
    $sql = "UPDATE tb_comentario SET comentario=? WHERE idcomentario=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'si', $comentario, $idcomentario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

function deletarcomentario($conexao, $idcomentario){
    $sql = "DELETE FROM tb_comentario WHERE idcomentario=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idcomentario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

?>
