<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #2E4A2B;
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            color: #D1D1D1;
        }

        .login-card h1 {
            font-family: 'Playfair Display', serif;
            color: #E8DCC0;
            font-weight: 700;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .login-card p {
            text-align: center;
            color: #D1D1D1;
            margin-bottom: 2rem;
        }

        .form-label {
            color: #E8DCC0;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #E8DCC0;
            border-radius: 8px;
            padding: 0.75rem;
        }

        .form-control::placeholder {
            color: #D1D1D1;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: #c4a574;
            box-shadow: 0 0 0 0.25rem rgba(196, 165, 116, 0.25);
            color: #fff;
        }

        .btn-login {
            background-color: rgba(255, 255, 255, 0.15);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            padding: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background-color: rgba(255, 255, 255, 0.25);
            color: #fff;
        }

        .register-link {
            display: block;
            text-align: center;
            color: #D1D1D1;
            font-size: 0.9rem;
            margin-top: 1rem;
            text-decoration: none;
        }

        .register-link:hover {
            color: #E8DCC0;
            text-decoration: underline;
        }

        .footer-text {
            text-align: center;
            color: #D1D1D1;
            font-size: 0.85rem;
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <h1>Bem-vindo</h1>
        <p>Entre com suas informações pessoais</p>
        <form action="verificarlogin.php" method="post">
            <div class="mb-3"> <label for="email" class="form-label">E-MAIL</label> <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required> </div>
            <div class="mb-3"> <label for="senha" class="form-label">SENHA</label> <input type="password" class="form-control" id="senha" name="senha" placeholder="••••••••" required> </div> <a href="formusuario.php" class="register-link">Não tem conta? Cadastre-se aqui</a> <button type="submit" class="btn btn-login w-100 mt-3">Entrar</button>
        </form>
    </div>
    <div class="footer-text">Sistema de Acesso Seguro</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>