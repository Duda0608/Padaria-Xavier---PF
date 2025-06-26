<?php

##5. sistema de pagamento

function salvar_pagamento($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status) {
    $sql = "INSERT INTO tb_pagamento (valor, data, avaliacao, pagamento, entrega, status) VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ddsdss', $valor, $data, $avaliacao, $pagamento, $entrega, $status);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;


}


function editar_pagamento ($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido) {
    $sql = "UPDATE tb_pagamento SET valor=?, data=?, avaliacao=?, pagamento=?, entrega=?, status=? WHERE idpedido=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssddddi',$valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;

}

##6. sistema de entregas

function salvar_entrega($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status) {
    $sql = "INSERT INTO tb_entrega (valor, data, avaliacao, pagamento, entrega, status) VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ddsdss', $valor, $data, $avaliacao, $pagamento, $entrega, $status);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;

}


##7. CONTROLE DE ESTOQUE

function salvar_estoque ($conexao, $nome, $tipo, $data, $quantidade) {
    $sql = "INSERT INTO - (nome, tipo, data, quantidade) VALUES (?, ?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssdd', $nome, $tipo, $data, $quantidade);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;

}

function editar_estoque ($conexao, $nome, $tipo, $data, $quantidade, $idestoque) {
    $sql = "UPDATE - SET nome=?, tipo=?, data=?, quantidade=?, idestoque=?";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssddi', $nome, $tipo, $data, $quantidade, $idestoque);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou
}

function  deletar_estoque ($conexao, $idestoque) {
    $sql = "DELETE FROM - WHERE - = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idestoque);
    $funcionou= mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;

}

function listar_estoque ($conexao) {
    $sql = "SELECT * FROM -";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_estoque [];
    while ($estoque = mysqli_fetch_assoc($resultado)){
        $listar_estoque[] = -
    }

    mysqli_stmt_close($comando);
    return $listar_estoque;
}

function pesquisar_estoque_nome ($conexao, $nome) {
    $sql = "SELECT * FROM -";
    $comando = mysqli_prepare($comando, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_result($comando);

    $pesquisar_estoque = [];
    while ($estoque = mysqli_fetch_assc($resultado)) {
        $idproduto = $estoque['idproduto'];
        $produto = - 
        }

}

function pesquisar_estoque_id ($conexao,$nome, $idestoque) {
    $sql = "SELECT * FROM tb_estoque WHERE idestoque = ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idestoque);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $produto = mysqli_fetch_assoc($resultado);
    
    mysqli_stmt_close($comando);
    return $estoque;

}


##8. status de pedido

function salvar_status($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status) {
    $sql = "INSERT INTO - (valor, data, avaliacao, pagamento, entrega, status) VALUES (?, ?, ?, ?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ddssss', $valor, $data, $avaliacao, $pagamento, $entrega, $status);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;


}

function editar_status($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido) {
    $sql = "UPDATE - SET valor=?, data=?, avaliacao=?, pagamento=?, entrega=?, status=?, idpedido=?";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ddssssi', $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou
    
}


function listar_status ($conexao) {
    $sql = "SELECT * FROM -";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_status = [];
    while ($cliente = mysqli_fetch_assoc($resultado)) {
        $lista_status[] = $status;
    }
}

##9. avaliação

function salvar_avaliacao ($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status) {
    $sql = "INSERT INTO - (nome, cpf, endereco) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sss', $nome, $cpf, $endereco);
    
    mysqli_stmt_execute($comando);
    
    // retorna o valor do id que acabou de ser inserido
    $idcliente = mysqli_stmt_insert_id($comando);

    mysqli_stmt_close($comando);

    return $idcliente;

}


function editar_avaliacao ($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido) {
    $sql = "UPDATE - SET valor=?, data=?, avaliacao=?, pagamento=?, entrega=?, status=? WHERE idpedido=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    // varchar, string, data -> s
    // inteiro -> i
    // dinheiro, decimal -> d
    mysqli_stmt_bind_param($comando, 'ddsdssi', $valor, $data, $avaliacao, $pagamento, $entrega, $status);
    

    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;

}

function deletar_avaliacao ($conexao, $idpedido) {
    $sql = "DELETE FROM tb_avaliacao WHERE idavaliacao = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idavaliacao);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou; //true ou false

}

function listar_avaliacao ($conexao) {
    $sql = "SELECT * FROM tb_avaliacao";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $listar_avaliacao = [];
    while ($produto = mysqli_fetch_assoc($resultado)) {
        $listar_avaliacao[] = $avaliacao;
    }

    mysqli_stmt_close($comando);
    return $listar_avaliacao;

}

##10. controle de permissão de acesso 

function salvar_permissoes ($conexao, $idadm) {
    $sql = "INSERT INTO tb_permissoes (idadm) VALUES (?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "i", $idadm);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;

}

function editar_permissoes ($conexao, $idadm) {
    $sql = "UPDATE tb_permissoes WHERE idadm=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idadm);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;

}

function deletar_permissoes ($conexao, $idadm) {
    $sql = "DELETE FROM tb_permissoes WHERE idadm = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idadm);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou; //true ou false

}

function listar_permissoes ($conexao, $idadm) {
    $sql = "SELECT * FROM tb_permissoes";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $listar_permissoes = [];
    while ($produto = mysqli_fetch_assoc($resultado)) {
        $listar_permissoes[] = $permissoes;
    }

    mysqli_stmt_close($comando);
    return $listar_permissoes;

}



?>