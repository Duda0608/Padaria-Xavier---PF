<?php

require_once "conexao.php";
require_once "funcoes.php";

// Escapar os dados recebidos do formulário para evitar SQL Injection
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
$preco_venda = mysqli_real_escape_string($conexao, $_POST['preco_venda']);
$lucro = mysqli_real_escape_string($conexao, $_POST['lucro']);

// Variáveis numéricas, portanto, não precisam de aspas
$tb_promocao_idpromocao = 0;  // Não usa aspas, pois é um número (INT)
$tbcategoria_idcategoria = 0; // Também não usa aspas, pois é um número (INT)

// Criando a consulta SQL
$sql = "INSERT INTO tb_produtos(nome, tipo, preco_venda, lucro, tb_promocao_idpromocao, tbcategoria_idcategoria) 
        VALUES ('$nome', '$tipo', '$preco_venda', '$lucro', $tb_promocao_idpromocao, $tbcategoria_idcategoria)"; // Sem aspas para os números

// Imprimir a consulta SQL para depuração
echo $sql; // Isso vai exibir a consulta SQL gerada

// Executar a consulta
if (mysqli_query($conexao, $sql)) {
    header("Location: home.php"); // Redirecionar após sucesso
} else {
    // Exibir erro, se houver
    echo "Erro: " . mysqli_error($conexao);
}
?>
