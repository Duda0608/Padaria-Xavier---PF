<?php
    require_once '../conexao.php';
    require_once '../funcoes.php';


$nome = "pão francês tradicional";
$tipo = "pão";
$data = "2025-06-25";
$quantidade = "7";
$idprodutos = '1';

salvarestoque($conexao, $nome, $tipo, $data, $quantidade, $idprodutos);




