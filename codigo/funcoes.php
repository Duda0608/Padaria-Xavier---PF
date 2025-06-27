<?php


//usuario

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

function editarusuario($conexao, $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo, $idusu){
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

function salvarpedido($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $tb_cliente_idcliente){
    $sql = "INSERT INTO tb_pedidos (valor, data, avaliacao, pagamento, entrega, status, tb_cliente_idcliente) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'dsiiiii', $valor, $data, $avaliacao, $pagamento, $entrega, $status, $tb_cliente_idcliente);

    mysqli_stmt_execute($comando);

    $idpedido = mysqli_stmt_insert_id($comando);

    mysqli_stmt_close($comando);
    return $idpedido;
};

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

function editarpedido($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido){
    $sql = "UPDATE tb_pedidos SET valor=?, data=?, avaliacao=?, pagamento=?, entrega=?, status=? WHERE idpedido=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'dsiiiii', $valor, $data, $avaliacao, $pagamento, $entrega, $status, $tb_cliente_idcliente);
     $funcionou = mysqli_stmt_execute($comando);

     mysqli_stmt_close($comando);
     return $funcionou;
};

function deletarpedido($conexao, $idpedido){
    $sql = "DELETE FROM tb_pedidos  WHERE  idpedido = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;

};

function pesquisarpedidonome($conexao, $nome){
    //nao sei fazer;-; sorry

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

function salvarprodutos($conexao, $nome, $tipo, $preco_venda, $lucro, $tb_promocao_idpromocao, $tbcategoria_idcategoria){
    $sql = "INSERT INTO tb_produtos (nome, tipo, preco_venda, lucro) VALUES (?,?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssssii', $nome, $tipo, $preco_venda, $lucro, $tb_promocao_idpromocao, $tbcategoria_idcategoria);

    mysqli_stmt_execute($comando);

    $idprodutos = mysqli_stmt_insert_id($comando);

    mysqli_stmt_close($comando);
    return $idprodutos;

};


function editarprodutos($conexao, $nome, $tipo, $preco_venda, $lucro, $idprodutos) {

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
    $sql = "SELECT * FROM tb_produtos";
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

function pesquisarprodutosnome($conexao, $nome){

};

function pesquisarprodutosid($conexao, $nome, $idprodutos){

};

//carrinhos(lucas ainda vai ensinar)

function listarcarrinho($produtos, $valor, $data, $quantidade){

};

function deletarcarrinho( $idprodutos){

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

function salvarentrega($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status) {
    $sql = "INSERT INTO tb_entrega (valor, data, avaliacao, pagamento, entrega, status) VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ddsdss', $valor, $data, $avaliacao, $pagamento, $entrega, $status);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;
};
//no nome_cliente.php, devemos fazer uma conexao com que pegue todos os dados do cliente (sendo pelo nome), listando:
//Endereco, nome e demais informacoes


//estoque

function salvarestoque ($conexao, $nome, $tipo, $data, $quantidade, $tb_produtos_idprodutos) {
    $sql = "INSERT INTO tb_estoques (nome, tipo, data, quantidade, tb_produtos_idprodutos) VALUES (?, ?, ?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssddi', $nome, $tipo, $data, $quantidade, $tb_produtos_idprodutos);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};

function editarestoque($conexao, $nome, $tipo, $data, $quantidade, $idestoque){
        $sql = "UPDATE - SET nome=?, tipo=?, data=?, quantidade=?, idestoque=?";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssddi', $nome, $tipo, $data, $quantidade, $idestoque);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;

};

function deletarestoque($conexao, $idestoque){
    $sql = "DELETE FROM - WHERE - = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idestoque);
    $funcionou= mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
    

};

function listarestoque($conexao){
    
    

};

function pesquisarestoquenome($conexao, $nome){

};

function pesquisarestoqueid($conexao,$nome, $idestoque){

};


//status

function salvarstatus($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status){

};

function editarstatus($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido){

};

function listarstatus($conexao){

};


//avaliacao

function salvaravaliacao($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status){

};

function editaravaliacao ($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido){

};

function deletaravaliacao($conexao, $idpedido){

};

function listaravaliacao($conexao){

};


//permissoes(lucas vai ensinar)

function salvarpermissoes($conexao, $idadm){

};

function editarpermissoes($conexao, $idadm){

};

function deletarpermissoes($conexao, $idadm){

};

function listarpermissoes($conexao, $idadm){

};

//*Permissoes de editar o site apenas para funcionarios 

//*Clientes podem acessar o site atravas do login e fazerem seus pedidos


//promocao

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

//categoria

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


//historico

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

//comentario

function salvarcomentario ($conexao, $nome, $comentario){
    $sql = "INSERT INTO tb_comentario (nome, comentario) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ss', $nome, $comentario);
    mysqli_stmt_execute($comando);
    $idcomentario = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);

    return $idcomentario;

};

function editarcomentario($conexao){
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