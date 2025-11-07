<?php
session_start();
session_destroy();
header("Location: carrinho_index.php");
exit;
?>