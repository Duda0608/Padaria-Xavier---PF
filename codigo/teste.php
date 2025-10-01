<?php if (isset($_GET['id'])) {
    require_once "conexao.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_usuarios WHERE idusuario = $id";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);
    $nome = $linha['nome'];
    $cpf = $linha['cpf'];
    $telefone = $linha['telefone'];
    $endereco = $linha['endereco'];
    $email = $linha['email'];
    $senha = $linha['senha'];
    $botao = "Atualizar";
} else {
    $id = 0;
    $nome = "";
    $cpf = "";
    $telefone = "";
    $endereco = "";
    $email = "";
    $senha = "";
    $botao = "Cadastrar";
} ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso ao Sistema</title>
    <script src="../jquery-3.7.1.min.js"></script>
    <script src="../jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#formusuario").validate({
                rules: {
                    nome: {
                        required: true
                    },
                    cpf: {
                        required: true,
                        minlength: 11,
                        digits: true
                    },
                    telefone: {
                        required: true,
                        minlength: 11,
                        digits: true
                    },
                    email: {
                        required: true
                    },
                    senha: {
                        required: true
                    },
                },
                messages: {
                    nome: {
                        required: "Esse campo deve ser preenchido"
                    },
                    cpf: {
                        required: "Informe seu CPF"
                    },
                    telefone: {
                        required: "Informe seu telefone"
                    },
                    email: {
                        required: "Este campo deve ser preenchido"
                    },
                    senha: {
                        required: "É necessário uma senha"
                    },
                }
            });
        });
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex"> <!-- Lado esquerdo com imagem -->
    <div class="w-1/2 h-screen"> <img src="sua-imagem.jpg" alt="Produtos" class="w-full h-full object-cover"> </div> <!-- Lado direito com formulário -->
    <div class="w-1/2 h-screen bg-[#2E4A2B] flex items-center justify-center font-[Inter]">
        <div class="w-full max-w-md px-10">
            <h1 class="text-center text-3xl font-[Playfair_Display] text-white mb-10"> Cadastre-se </h1>
            <form id="formusuario" action="salvarusuario.php?id=<?php echo $id; ?>" method="post" class="space-y-6 text-white"> <!-- Nome -->
                <div> <label for="nome" class="block text-sm font-semibold mb-1">Nome:</label> <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" class="w-full px-4 py-2 rounded-full border border-white bg-transparent text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white"> </div> <!-- CPF e Telefone lado a lado -->
                <div class="grid grid-cols-2 gap-4">
                    <div> <label for="cpf" class="block text-sm font-semibold mb-1">CPF:</label> <input type="text" name="cpf" id="cpf" value="<?php echo $cpf; ?>" class="w-full px-4 py-2 rounded-full border border-white bg-transparent text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white"> </div>
                    <div> <label for="telefone" class="block text-sm font-semibold mb-1">Telefone:</label> <input type="text" name="telefone" id="telefone" value="<?php echo $telefone; ?>" class="w-full px-4 py-2 rounded-full border border-white bg-transparent text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white"> </div>
                </div> <!-- Email -->
                <div> <label for="email" class="block text-sm font-semibold mb-1">Email:</label> <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="w-full px-4 py-2 rounded-full border border-white bg-transparent text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white"> </div> <!-- Senha -->
                <div> <label for="senha" class="block text-sm font-semibold mb-1">Senha:</label> <input type="password" name="senha" id="senha" value="<?php echo $senha; ?>" class="w-full px-4 py-2 rounded-full border border-white bg-transparent text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white"> </div> <!-- Botão -->
                <div class="text-center"> <input type="submit" value="<?php echo $botao; ?>" class="px-8 py-2 rounded-full border border-white text-white font-semibold hover:bg-white hover:text-[#2E4A2B] transition"> </div>
            </form>
        </div>
    </div>
</body>

</html>