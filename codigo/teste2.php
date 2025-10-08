<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <style>
        corpousuario {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #2E4A2B;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #D1D1D1;
            flex-direction: column;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            width: 80px;
            height: auto;
        }

        .container {
            background-color: rgba(46, 74, 43, 0.95);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 320px;
            text-align: center;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            color: #E8DCC0;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            color: #D1D1D1;
            margin-bottom: 25px;
        }

        label {
            display: block;
            text-align: left;
            font-size: 12px;
            margin-bottom: 5px;
            color: #D1D1D1;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #5C7551;
            border-radius: 6px;
            background-color: transparent;
            color: #E8DCC0;
            margin-bottom: 15px;
        }

        input::placeholder {
            color: #A9B8A0;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #5C7551;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #4E6445;
        }

        .login-link {
            margin-top: 10px;
            font-size: 13px;
        }

        .login-link a {
            color: #D4C5A9;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        footer {
            position: absolute;
            bottom: 20px;
            font-size: 12px;
            color: #D1D1D1;
        }
    </style>
</head>

<body>
    <div class="logo"> <img src="logo.png" alt="Logo da Empresa"> </div>
    <div class="container">
        <h1>Criar Conta</h1>
        <p>Preencha suas informações para se cadastrar</p>
        <form> <label for="nome">NOME COMPLETO</label> <input type="text" id="nome" placeholder="Seu nome completo" required> <label for="email">E-MAIL</label> <input type="email" id="email" placeholder="seu@email.com" required> <label for="senha">SENHA</label> <input type="password" id="senha" placeholder="********" required> <label for="confirmar-senha">CONFIRMAR SENHA</label> <input type="password" id="confirmar-senha" placeholder="********" required> <button type="submit">Cadastrar</button> </form>
        <div class="login-link"> Já tem uma conta? <a href="#">Entre aqui</a> </div>
    </div>
    <footer>Sistema de Acesso Seguro</footer>
</body>

</html>