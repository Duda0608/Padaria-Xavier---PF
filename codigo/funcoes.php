<?php


//usuario

function salvarusuario($conexao, $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo){
    $sql = "INSERT INTO tb_usuario (nome, cpf, telefone, endereco, email, senha, administrador, controlelogin, gerenciapromo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($comando, 'ssssssiii', $nome, $cpf, $telefone, $endereco, $email, $senha_hash, $administrador, $controlelogin, $gerenciapromo);

    mysqli_stmt_execute($comando);

    $idusuario = mysqli_stmt_insert_id($comando);

    mysqli_stmt_close($comando);
    return $idusuario;
};

function listarusuario($conexao){
    $sql = "SELECT * FROM tb_usuario";
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
    $sql = "UPDATE tb_usuario SET nome=?, cpf=?, telefone=?, endereco=?, email=?, senha=?, administrador=?, controlelogin=?, gerenciapromo=? WHERE idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssssssiiii', $nome, $cpf, $telefone, $endereco, $email, $senha, $administrador, $controlelogin, $gerenciapromo, $idusuario);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};

function deletarusuario($conexao, $idusuario) {
    $sql = "DELETE FROM tb_usuario WHERE idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;

};

function pesquisarusuarionome($conexao, $nome) {
    $sql = "SELECT * FROM tb_usuario WHERE nome = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 's', $nome);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $nome = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $nome;

};

function pesquisarusuarioid($conexao, $idusuario){
    $sql = "SELECT * FROM tb_usuario WHERE idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idusuario);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $usuario = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $usuario;

};


//pedidos

function salvarpedido($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status){

};

function listarpedido($conexao){

};

function editarpedido($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido){

};

function deletarpedido($conexao, $idpedido){

};

function pesquisarpedidonome($conexao, $nome){

};

function pesquisarpedidoid($conexao, $nome, $idpedido){

};


//cardapio-produtos

function salvarprodutos($conexao, $nome, $tipo, $preco_venda, $lucro){

};

function editarprodutos($conexao, $nome, $tipo, $preco_venda, $lucro, $idprodutos) {

};

function deletarprodutos($conexao, $idprodutos){

};

function listarprodutos($conexao){

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

function salvarpagamento($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status){

};
function editarpagamento($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status, $idpedido){

};


//entrega

function salvarentrega($conexao, $valor, $data, $avaliacao, $pagamento, $entrega, $status){

};
//no nome_cliente.php, devemos fazer uma conexao com que pegue todos os dados do cliente (sendo pelo nome), listando:
//Endereco, nome e demais informacoes


//estoque

function salvarestoque($conexao, $nome, $tipo, $data, $quantidade){

};

function editarestoque($conexao, $nome, $tipo, $data, $quantidade, $idestoque){

};

function deletarestoque($conexao, $idestoque){

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

};

function editarpromocao($conexao, $produto, $datainicio, $datafinal, $valor, $idpromocao){

};

function deletarpromocao($conexao, $idpromocao){

};

function listarpromocao($conexao){

};


//login

function salvarlogin ($conexao, $email, $senha){

};

function listarlogin($conexao){

};

function pesquisarlogin($conexao, $gmail, $senha){

};

//categoria

function salvarcategoria($conexao, $nome, $descricao){

};

function listarcategoria($conexao){

};

function editarcategoria($conexao, $nome, $descricao, $idcategoria){

};

function deletarcategoria($conexao, $idcategoria){

};

function pesquisarcategoriaid($conexao, $nome, $idcategoria){

};


function pesquisarcategorianome($conexao, $nome){

};


//historico

function salvarhistorico($conexao, $nome, $historico){

};

function listarhistorico($conexao){

};

function deletarhistorico($conexao, $idpedido){

};

function pesquisarhistoriconome($conexao, $nome){

};

//comentario

function salvarcomentario ($conexao, $nome, $comentario){

};

function editarcomentario($conexao){

};

function deletarcomentario($conexao, $idcomentario){

};

?>