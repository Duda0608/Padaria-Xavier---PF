<?php
    require_once "conexao.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tb_usuarios WHERE email ='$email'";

    $resultado = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($resultado) ==0){
        header("Location: index.php");
    }
    else{
        $linha = mysqli_fetch_array($resultado);
        $senha_banco = $linha['senha'];
        $id = $linha['idusuario'];
        $adm = $linha['administrador'];

        if (password_verify($senha, $senha_banco)){

            session_start();
            $_SESSION['adm'] = $adm;
            $_SESSION['logado'] = 'sim';
            $_SESSION['id'] = $id;
            header("Location: home.php");
        }
        else {
            header("Location: index.php");
        }
    }
    ?>