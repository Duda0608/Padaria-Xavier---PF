<?php
require_once "../conexao.php";  // Ajuste o caminho conforme seu projeto
require_once "../funcoes.php";

$idusuario = 1;  // Id do usuário que quer alterar
$permissoes = "admin,controlelogin";  // Exemplo: permissões que quer salvar

salvarPermissoes($conexao, $idusuario, $permissoes);

?>