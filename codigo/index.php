<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            box-sizing: border-box;
        }

        .font-serif-custom {
            font-family: 'Playfair Display', serif;
        }

        .font-sans-custom {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4" style="background-color: #2E4A2B;">
    <div class="w-full max-w-md">
        <!-- Card principal -->
        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl shadow-2xl p-8 border border-white border-opacity-20">
            <!-- Cabeçalho -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white mb-2 font-serif-custom">Bem-vindo</h1>
                <p class="text-gray-300 font-sans-custom" style="color: #D1D1D1;">Entre com suas informações pessoais</p>
            </div>

            <form action="verificarlogin.php" method="post" class="space-y-6">
                
                <div>
                    <label for="email" class="block text-sm font-medium text-white mb-2 font-sans-custom">
                        E-MAIL
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        required
                        class="w-full px-4 py-3 border border-white border-opacity-30 rounded-lg focus:ring-2 focus:ring-white focus:ring-opacity-50 focus:border-white transition-all duration-200 bg-white bg-opacity-10 text-white placeholder-gray-300 font-sans-custom backdrop-blur-sm"
                        placeholder="seu@email.com">
                </div>

                <div>
                    <label for="senha" class="block text-sm font-medium text-white mb-2 font-sans-custom">
                        SENHA
                    </label>
                    <input
                        type="password"
                        name="senha"
                        id="senha"
                        required
                        class="w-full px-4 py-3 border border-white border-opacity-30 rounded-lg focus:ring-2 focus:ring-white focus:ring-opacity-50 focus:border-white transition-all duration-200 bg-white bg-opacity-10 text-white placeholder-gray-300 font-sans-custom backdrop-blur-sm"
                        placeholder="••••••••">
                </div>

              
                <div class="text-center">
                    <a
                        href="formusuario.php"
                        class="text-white hover:text-gray-300 text-sm font-medium transition-colors duration-200 hover:underline font-sans-custom"
                        style="color: #D1D1D1;">
                        Não tem conta? Cadastre-se aqui
                    </a>
                </div>


                <button
                    type="submit"
                    class="w-full bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 focus:ring-2 focus:ring-white focus:ring-opacity-50 shadow-lg hover:shadow-xl backdrop-blur-sm border border-white border-opacity-30 font-sans-custom">
                    Entrar
                </button>
            </form>
        </div>

        
        <div class="text-center mt-6">
            <p class="text-gray-300 text-sm font-sans-custom" style="color: #D1D1D1;">
                Sistema de Acesso Seguro
            </p>
        </div>
    </div>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML = "window.__CF$cv$params={r:'984bfcf8a1c31c9c',t:'MTc1ODgxODY4Ny4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
</body>

</html>