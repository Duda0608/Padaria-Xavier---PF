<?php
require_once "conexao.php";

$id = $_GET['id'];
$nome = $_POST['nome'];
$preco_venda = $_POST['preco_venda'];
$tbcategoria_idcategoria = $_POST['tbcategoria_idcategoria'];

// variável pra guardar o nome da foto
$foto = "";

// se o usuário escolheu uma foto, salva ela na pasta
if ($_FILES["foto"]["name"] != "") {
    $pasta = "fotos/"; // nome da pasta onde as imagens vão ficar
    if (!file_exists($pasta)) {
        mkdir($pasta); // cria a pasta se ainda não existir
    }
    $foto = $_FILES["foto"]["name"]; // pega o nome do arquivo
    move_uploaded_file($_FILES["foto"]["tmp_name"], $pasta . $foto); // move o arquivo pra pasta
}

// se for um cadastro novo
if ($id == 0) {
    // comando pra inserir no banco
    $sql = "INSERT INTO tb_produtos (nome, preco_venda, tbcategoria_idcategoria, foto)
            VALUES ('$nome', '$preco_venda', '$tbcategoria_idcategoria', '$foto')";
} else {
    // se o usuário não trocar a foto
    if ($foto == "") {
        // atualiza sem mexer na imagem
        $sql = "UPDATE tb_produtos SET nome='$nome', preco_venda='$preco_venda', tbcategoria_idcategoria='$tbcategoria_idcategoria' WHERE idprodutos=$id";
    } else {
        // se ele escolher uma nova foto
        $sql = "UPDATE tb_produtos SET nome='$nome', preco_venda='$preco_venda', tbcategoria_idcategoria='$tbcategoria_idcategoria', foto='$foto' WHERE idprodutos=$id";
    }
}

// executa o comando no banco
mysqli_query($conexao, $sql);

// volta pra lista de produtos
header("location: listarprodutos.php");
?>