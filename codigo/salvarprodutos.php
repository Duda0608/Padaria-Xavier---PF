<?php

require_once "conexao.php";
require_once "funcoes.php";

// Escapar os dados recebidos do formulário
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
$preco_venda = mysqli_real_escape_string($conexao, $_POST['preco_venda']);
$lucro = mysqli_real_escape_string($conexao, $_POST['lucro']);

// Variáveis numéricas, portanto não precisam de aspas
$tb_promocao_idpromocao = 0;  // Sem aspas, porque é um número
$tbcategoria_idcategoria = 0; // Também é um número, então sem aspas

// Agora a consulta está correta, sem aspas para os números
$sql = "INSERT INTO tb_produtos(nome, tipo, preco_venda, lucro, tb_promocao_idpromocao, tbcategoria_idcategoria) 
        VALUES ('$nome', '$tipo', '$preco_venda', '$lucro', $tb_promocao_idpromocao, $tbcategoria_idcategoria)";

if (mysqli_query($conexao, $sql)) {
    header("Location: home.php"); // Redirecionar após sucesso
} else {
    echo "Erro: " . mysqli_error($conexao); // Exibir erro, se houver
}
?>
