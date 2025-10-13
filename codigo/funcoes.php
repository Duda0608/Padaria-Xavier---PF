<?php


//usuario...........
function salvarusuario($conexao, $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo){
    $sql = "INSERT INTO tb_usuarios (nome, cpf, telefone, endereco, email, senha, administrador, controlelogin, gerenciapromo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($comando, 'ssssssiii', $nome, $cpf, $telefone, $endereco, $email, $senha_hash, $administrador, $controlelogin, $gerenciapromo);

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

    $lista_usuario = [];
    while ($usuario = mysqli_fetch_assoc($resultado)){
        $lista_usuario[] = $usuario;
    }

    mysqli_stmt_close($comando);
    return $lista_usuario;

};

function editarusuario($conexao, $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo, $idusuario){
    $sql = "UPDATE tb_usuarios SET nome=?, cpf=?, telefone=?, endereco=?, email=?, senha=?, administrador=?, controlelogin=?, gerenciapromo=? WHERE idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssssssiiii', $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo, $idusuario);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};

function deletarusuario($conexao, $idusuario) {
    $sql = "DELETE FROM tb_usuarios WHERE idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;

};

function pesquisarusuarionome($conexao, $nome) {
    $sql = "SELECT * FROM tb_usuarios WHERE nome = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 's', $nome);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $nome = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $nome;

};

function pesquisarusuarioid($conexao, $idusuario){
    $sql = "SELECT * FROM tb_usuarios WHERE idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idusuario);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $usuario = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $usuario;

};


//pedidos

function salvarpedido($conexao, $valor, $data, $pagamento, $entrega, $tb_cliente_idcliente){
    $sql = "INSERT INTO tb_pedidos (valor, data, pagamento, entrega, tb_cliente_idcliente) VALUES (?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'dsssi', $valor, $data, $pagamento, $entrega, $tb_cliente_idcliente);

    mysqli_stmt_execute($comando);

    $idpedido = mysqli_insert_id($conexao);

    mysqli_stmt_close($comando);
    return $idpedido;
}


function listarpedido($conexao){
    $sql = "SELECT * FROM tb_pedidos";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_pedido = [];
    while($pedido = mysqli_fetch_assoc($resultado))  {
        $lista_pedido[] = $pedido;
    }
    mysqli_stmt_close($comando);
    return $lista_pedido;

};

function editarpedido($conexao, $valor, $data, $pagamento, $entrega, $idpedido){
    $sql = "UPDATE tb_pedidos SET valor=?, data=?, pagamento=?, entrega=? WHERE idpedido=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'dsssi', $valor, $data, $pagamento, $entrega, $idpedido);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
}


function deletarpedido($conexao, $idpedido){
    $sql = "DELETE FROM tb_pedidos WHERE idpedido = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idpedido);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
}


function pesquisarpedidonome($conexao, $idpedido) {
    $sql = "SELECT * FROM tb_pedidos WHERE idpedido = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 's', $idpedido);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $pedidos = [];
    while ($pedido = mysqli_fetch_assoc($resultado)) {
        $pedidos[] = $pedido;
    }

    mysqli_stmt_close($comando);
    return $pedidos;
};


function pesquisarpedidoid($conexao, $idpedido){
    $sql = "SELECT * FROM tb_pedidos WHERE idpedido = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idpedido);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $pedido = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $pedido;

};


//cardapio-produtos

function salvarprodutos($conexao, $nome, $preco_venda, $tbcategoria_idcategoria){
    $sql = "INSERT INTO tb_produtos (nome, preco_venda, tbcategoria_idcategoria) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssi', $nome, $preco_venda, 
     $tbcategoria_idcategoria);

    mysqli_stmt_execute($comando);

    $idprodutos = mysqli_stmt_insert_id($comando);

    mysqli_stmt_close($comando);
    return $idprodutos;

};



function editarprodutos($conexao, $nome, $preco_venda, $idcategoria, $idprodutos){
    $sql = "UPDATE tb_produtos SET nome=?, preco_venda=?, tbcategoria_idcategoria=? WHERE idprodutos=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'sdii', $nome, $preco_venda, $idcategoria, $idprodutos);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};


function deletarprodutos($conexao, $idprodutos){
    $sql = "DELETE FROM tb_produtos WHERE idprodutos = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idprodutos);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;


};

function listarprodutos($conexao){
    $sql = "SELECT idprodutos, tb_produtos.nome as nome_produto, preco_venda, tb_categorias.nome as nome_categoria  FROM tb_produtos INNER JOIN tb_categorias ON tb_produtos.idprodutos = tb_categorias.idcategoria;";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_produto = [];
    while ($produto = mysqli_fetch_assoc($resultado)){
        $lista_produto[] = $produto;
    }

    mysqli_stmt_close($comando);
    return $lista_produto;

};

function pesquisarprodutosnome($conexao, $nome) {
    $sql = "SELECT * FROM tb_produtos WHERE nome = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 's', $nome);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $produto = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $produto;
};

function pesquisarprodutosid($conexao, $idprodutos) {
    $sql = "SELECT * FROM tb_produtos WHERE idprodutos = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idprodutos);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $produto = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $produto;
};

function listarcarrinho($carrinho) {
    foreach ($carrinho as $item) {
        echo "Produto: " . $item['nome'] . "<br>";
        echo "Valor: " . $item['valor'] . "<br>";
        echo "Data: " . $item['data'] . "<br>";
        echo "Quantidade: " . $item['quantidade'] . "<br>";
        echo "<hr>";
    }
};

function deletarcarrinho($carrinho, $idproduto) {
    $novocarrinho = array();

    for ($i = 0; $i < count($carrinho); $i++) {
        if ($carrinho[$i]['idprodutos'] != $idproduto) {
            $novocarrinho[] = $carrinho[$i];
        }
    }

    return $novocarrinho;
};

function enviarcarrinho($produto, $valor, $data, $quantidade){

};

//no listar_carrinho.php, devemos fazer uma conexao com adicionar_carrinho.php do controle de cardapio da ADM; 
//EX: require_once adicionar_carrinho.php;


//pagamento

function salvarpagamento($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $tb_cliente_idcliente) {
    $sql = "INSERT INTO tb_pedidos (valor, data, avaliacao, pagamento, entrega, status, tb_cliente_idcliente) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'dsisssi', $valor, $data, $avaliacao, $pagamento, $entrega, $status, $tb_cliente_idcliente);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;

};
function editarpagamento ($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido) {
    $sql = "UPDATE tb_pedidos SET valor=?, data=?, avaliacao=?, pagamento=?, entrega=?, status=? WHERE idpedido=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssddddi',$valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};


//entrega

function salvarentrega($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $tb_cliente_idcliente) {
    $sql = "INSERT INTO tb_pedidos (valor, data, avaliacao, pagamento, entrega, status, tb_cliente_idcliente) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'dssdssi', $valor, $data, $avaliacao, $pagamento, $entrega, $status, $tb_cliente_idcliente);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;
};
//no nome_cliente.php, devemos fazer uma conexao com que pegue todos os dados do cliente (sendo pelo nome), listando:
//Endereco, nome e demais informacoes


function garanteProdutoExistente($conexao) {
    $sql = "SELECT idprodutos FROM tb_produtos WHERE idprodutos = 1";
    $res = mysqli_query($conexao, $sql);
    if (mysqli_fetch_assoc($res)) {
        return 1;
    }

    // Criar promoção padrão
    mysqli_query($conexao, 
        "INSERT INTO tb_promocaos (produto, datainicio, datafinal, valor) 
         VALUES ('Sem Promoção', '2025-01-01', '2025-12-31', 0)"
    );
    $idpromo = mysqli_insert_id($conexao);

    // Criar categoria padrão
    mysqli_query($conexao, 
        "INSERT INTO tb_categorias (nome, descricao) 
         VALUES ('Sem Categoria', 'Categoria padrão')"
    );
    $idcat = mysqli_insert_id($conexao);

    // Criar produto básico
    mysqli_query($conexao, 
        "INSERT INTO tb_produtos (nome, tipo, preco_venda, lucro, tb_promocao_idpromocao, tbcategoria_idcategoria) 
         VALUES ('Produto Padrão', 'genérico', '0.00', '0.00', $idpromo, $idcat)"
    );
    return mysqli_insert_id($conexao);
}


function salvarestoque($conexao, $nome, $tipo, $data, $quantidade, $idprodutos) {
    $sql = "INSERT INTO tb_estoques (nome, tipo, data, quantidade, tb_produtos_idprodutos) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sssdi", $nome, $tipo, $data, $quantidade, $idprodutos);
    mysqli_stmt_execute($stmt);
    $idestoque = mysqli_stmt_insert_id($stmt);
    mysqli_stmt_close($stmt);
    return $idestoque;
}


function listarestoque($conexao){
    $sql = "SELECT * FROM tb_estoques";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_estoques = [];
    while ($estoque = mysqli_fetch_assoc($resultado)){
        $lista_estoques[] = $estoque;
    }

    mysqli_stmt_close($comando);
    return $lista_estoques;
}

//status

function salvarstatus($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idcliente) {
    $sql = "INSERT INTO tb_pedidos (valor, data, avaliacao, pagamento, entrega, status, tb_cliente_idcliente)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    if (!$stmt) {
        die("Erro na preparação da query: " . mysqli_error($conexao));
    }

   mysqli_stmt_bind_param($stmt, "dssssii", $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idcliente);

    if (mysqli_stmt_execute($stmt)) {
        $id = mysqli_insert_id($conexao);
        mysqli_stmt_close($stmt);
        return $id;
    } else {
        echo "Erro ao executar query: " . mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        return false;
    }
}

function editarstatus($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido) {
    $sql = "UPDATE tb_pedidos 
            SET valor = ?, data = ?, avaliacao = ?, pagamento = ?, entrega = ?, status = ?
            WHERE idpedido = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "disssii", $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido);

    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $success;
}

function listarstatus($conexao) {
    $sql = "SELECT * FROM tb_pedidos ORDER BY data DESC";
    $resultado = mysqli_query($conexao, $sql);

    $pedidos = [];
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $pedidos[] = $linha;
    }

    return $pedidos;
}

//avaliacao

function salvaravaliacao($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idcliente) {
    $sql = "INSERT INTO tb_pedidos (valor, data, avaliacao, pagamento, entrega, status, tb_cliente_idcliente)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "dsissii", $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idcliente);
    if (mysqli_stmt_execute($stmt)) {
        $id = mysqli_insert_id($conexao);
        mysqli_stmt_close($stmt);
        return $id;
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function editaravaliacao($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido) {
    $sql = "UPDATE tb_pedidos SET valor = ?, data = ?, avaliacao = ?, pagamento = ?, entrega = ?, status = ? WHERE idpedido = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "dsissii", $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido);

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

function deletaravaliacao($conexao, $idpedido) {
    $sql = "DELETE FROM tb_pedidos WHERE idpedido = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idpedido);

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

function listaravaliacao($conexao){
    $sql = "SELECT * FROM tb_pedidos";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_avaliacao = [];
    while ($avaliacao = mysqli_fetch_assoc($resultado)){
        $lista_avaliacao[] = $avaliacao;
    }

    mysqli_stmt_close($comando);
    return $lista_avaliacao;

};


//permissoes(lucas vai ensinar)

function salvarPermissoes($conexao, $idusuario, $permissoesStr) {
    $permissoes = explode(',', $permissoesStr);

    $administrador = in_array('admin', $permissoes) ? 1 : 0;
    $controlelogin = in_array('controlelogin', $permissoes) ? 1 : 0;
    $gerenciapromo = in_array('gerenciapromo', $permissoes) ? 1 : 0;

    $sql = "UPDATE tb_usuarios SET 
                administrador = $administrador, 
                controlelogin = $controlelogin, 
                gerenciapromo = $gerenciapromo
            WHERE idusuario = $idusuario";

    if (mysqli_query($conexao, $sql)) {
        echo "Permissões atualizadas com sucesso!";
    } else {
        echo "Erro ao atualizar permissões: " . mysqli_error($conexao);
    }
}

function editarpermissoes($conexao, $idadm, $novo_status) {
    $sql = "UPDATE tb_usuarios SET administrador = ? WHERE idusuario = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $novo_status, $idadm);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
};

function deletarpermissoes($conexao, $idadm) {
    $sql = "UPDATE tb_usuarios SET administrador = 0 WHERE idusuario = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idadm);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
};

function listarpermissoes($conexao, $idadm) {
    $sql = "SELECT administrador FROM tb_usuarios WHERE idusuario = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idadm);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $administrador);
    if (mysqli_stmt_fetch($stmt)) {
        mysqli_stmt_close($stmt);
        return $administrador;
    } else {
        mysqli_stmt_close($stmt);
        return null;
    }
};

//*Permissoes de editar o site apenas para funcionarios 

//*Clientes podem acessar o site atravas do login e fazerem seus pedidos


//promocao

function salvarpromocao($conexao, $datainicio, $datafinal, $valor, $tb_produtos_idprodutos) {
    $sql = "INSERT INTO tb_promocaos (datainicio, datafinal, valor, tb_produtos_idprodutos) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    if (!$stmt) {
        die("Erro na preparação da query: " . mysqli_error($conexao));
    }
    mysqli_stmt_bind_param($stmt, "ssdi", $datainicio, $datafinal, $valor, $tb_produtos_idprodutos);

    if (mysqli_stmt_execute($stmt)) {
        $idpromocao = mysqli_insert_id($conexao);
        mysqli_stmt_close($stmt);
        return $idpromocao;
    } else {
        echo "Erro ao executar query: " . mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        return false;
    }
}


function editarpromocao($conexao, $datainicio, $datafinal, $valor, $tb_produtos_idprodutos, $idpromocao){
    $sql = "UPDATE tb_promocaos SET produto=?, datainicio=?, datafinal=?, valor=?, $tb_produtos_idprodutos=? WHERE idpromocao=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssdii', $datainicio, $datafinal, $valor, $idpromocao, $tb_produtos_idprodutos);
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
    $sql = "SELECT 
                tb_promocaos.idpromocao,
                tb_promocaos.datainicio,
                tb_promocaos.datafinal,
                tb_promocaos.valor,
                tb_produtos.nome AS nome_produtos
            FROM tb_promocaos
            INNER JOIN tb_produtos
                ON tb_promocaos.tb_produtos_idprodutos = tb_produtos.idprodutos";

    $resultado = mysqli_query($conexao, $sql);

    $lista = array();
    while ($item = mysqli_fetch_array($resultado)) {
        $lista[] = $item;
    }

    return $lista;
}



//login

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
    $sql = "SELECT * FROM tb_pedidos";
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

//categoria

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
}


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
    $sql = "SELECT * FROM tb_categoria WHERE nome=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 's', $nome);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $categoria = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);

    return $categoria;

};


//historico

function salvarhistorico($conexao, $idusuario){
    $sql = "SELECT idpedido, valor, data, avaliacao, pagamento, entrega, status 
            FROM tb_pedidos 
            WHERE tb_cliente_idcliente = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idusuario);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    $pedidos = [];
    while ($pedido = mysqli_fetch_assoc($resultado)) {
        $pedidos[] = $pedido;
    }

    mysqli_stmt_close($stmt);
    return $pedidos;
}


function listarhistorico($conexao){
    $sql = "SELECT * FROM tb_pedidos";
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
    $sql = "DELETE FROM tb_historicos WHERE idpedido=?";
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

//comentario

function salvarcomentario($conexao, $nome, $comentario) {
    // encontrar o ID do usuário com esse nome
    $sqlUsuario = "SELECT idusuario FROM tb_usuarios WHERE nome = ?";
    $stmtUsuario = mysqli_prepare($conexao, $sqlUsuario);
    mysqli_stmt_bind_param($stmtUsuario, "s", $nome);
    mysqli_stmt_execute($stmtUsuario);
    $resultado = mysqli_stmt_get_result($stmtUsuario);
    $usuario = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($stmtUsuario);

    if (!$usuario) {
        die("Usuário '$nome' não encontrado.");
    }

    $idusuario = $usuario['idusuario'];

    $sql = "INSERT INTO tb_comentarios (comentario, tb_usuario_idusuario) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "si", $comentario, $idusuario);
    mysqli_stmt_execute($stmt);

    $idcomentario = mysqli_insert_id($conexao);
    mysqli_stmt_close($stmt);

    return $idcomentario;
}


function listarcomentarios($conexao) {
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


function editarcomentario($conexao){
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