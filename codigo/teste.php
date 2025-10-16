<?php
require_once "verificarlogado.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #e8dcc0 0%, #d4c5a9 60%, #2E4A2B 100%);
            font-family: 'Inter', Arial, sans-serif;
            color: #2E4A2B;
            min-height: 100vh;
            margin: 0;
        }

        .main-card {
            background: rgba(255,255,255,0.97);
            border-radius: 24px;
            box-shadow: 0 8px 32px rgba(44, 74, 43, 0.13);
            padding: 48px 32px 32px 32px;
            max-width: 1100px;
            margin: 48px auto 0 auto;
        }

        .titulo-usuarios {
            font-family: 'Playfair Display', serif;
            color: #2E4A2B;
            font-size: 2.6rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-align: center;
            margin-bottom: 36px;
            text-shadow: 0 2px 8px #e8dcc0;
        }

        .tabela-usuarios {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 16px rgba(44, 74, 43, 0.08);
        }

        .tabela-usuarios thead tr {
            background: #2E4A2B;
            color: #e8dcc0;
            font-family: 'Playfair Display', serif;
            font-size: 1.13rem;
            letter-spacing: 1px;
        }

        .tabela-usuarios tbody tr {
            transition: box-shadow 0.2s, transform 0.2s;
        }

        .tabela-usuarios tbody tr:hover {
            box-shadow: 0 2px 12px #2E4A2B33;
            transform: scale(1.01);
            background: #e8dcc0 !important;
        }

        .tabela-usuarios tbody tr:nth-of-type(odd) {
            background-color: #f5f3ee;
        }

        .tabela-usuarios tbody tr:nth-of-type(even) {
            background-color: #d4c5a9;
        }

        .tabela-usuarios td, .tabela-usuarios th {
            vertical-align: middle;
            padding: 16px 12px;
            border: none;
        }

        .btn-editar {
            background: #2E4A2B;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 7px 22px;
            font-size: 1rem;
            font-family: 'Inter', Arial, sans-serif;
            font-weight: 500;
            margin: 0 2px;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            box-shadow: 0 1px 4px rgba(44, 74, 43, 0.07);
        }

        .btn-editar:hover {
            background: #c4a574;
            color: #2E4A2B;
            box-shadow: 0 2px 8px #c4a57455;
        }

        .btn-excluir {
            background: #c4a574;
            color: #2E4A2B;
            border: none;
            border-radius: 6px;
            padding: 7px 22px;
            font-size: 1rem;
            font-family: 'Inter', Arial, sans-serif;
            font-weight: 500;
            margin: 0 2px;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            box-shadow: 0 1px 4px rgba(44, 74, 43, 0.07);
        }

        .btn-excluir:hover {
            background: #2E4A2B;
            color: #fff;
            box-shadow: 0 2px 8px #2E4A2B55;
        }

        .btn-sair {
            background: #2E4A2B;
            color: #fff;
            padding: 14px 44px;
            border-radius: 12px;
            font-family: 'Inter', Arial, sans-serif;
            font-size: 1.13rem;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 2px 12px rgba(44, 74, 43, 0.13);
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            margin-top: 32px;
        }

        .btn-sair:hover {
            background: #c4a574;
            color: #2E4A2B;
            box-shadow: 0 4px 16px #c4a57455;
        }

        .alert-warning {
            background: #fffbe6;
            color: #856404;
            border: 1px solid #ffeeba;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 32px;
            text-align: center;
            font-size: 1.13rem;
            font-family: 'Inter', Arial, sans-serif;
        }

        @media (max-width: 900px) {
            .main-card {
                padding: 32px 8px 24px 8px;
            }
            .titulo-usuarios {
                font-size: 1.5rem;
            }
        }
        @media (max-width: 600px) {
            .main-card {
                padding: 16px 2px 12px 2px;
            }
            .titulo-usuarios {
                font-size: 1.1rem;
            }
            .btn-sair {
                padding: 10px 18px;
                font-size: 1rem;
            }
            .tabela-usuarios td, .tabela-usuarios th {
                padding: 10px 4px;
            }
        }
    </style>
</head>

<body>
    <div class="main-card">
        <h1 class="titulo-usuarios mb-4">LISTA DE USUÁRIOS</h1>
        <?php
        require_once "conexao.php";
        require_once "funcoes.php";

        $lista_usuario = listarusuario($conexao);

        if (count($lista_usuario) == 0) {
            echo "<div class='alert alert-warning text-center'>Não existe usuários cadastrados.</div>";
        } else {
        ?>
            <div class="table-responsive rounded-4 shadow-sm">
                <table class="table align-middle table-hover tabela-usuarios">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>CPF</th>
                            <th>TELEFONE</th>
                            <th>ENDEREÇO</th>
                            <th>EMAIL</th>
                            <th colspan="2" class="text-center">AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($lista_usuario as $usuario) {
                        $idusuario = $usuario['idusuario'];
                        $nome = $usuario['nome'];
                        $cpf = $usuario['cpf'];
                        $telefone = $usuario['telefone'];
                        $endereco = $usuario['endereco'];
                        $email = $usuario['email'];

                        echo "<tr>";
                        echo "<td>$idusuario</td>";
                        echo "<td>$nome</td>";
                        echo "<td>$cpf</td>";
                        echo "<td>$telefone</td>";
                        echo "<td>$endereco</td>";
                        echo "<td>$email</td>";
                        echo "<td class='text-center'><a class='btn btn-sm btn-editar' href='formusuario.php?id=$idusuario'>Editar</a></td>";
                        echo "<td class='text-center'><a class='btn btn-sm btn-excluir' href='deletarusuario.php?id=$idusuario'>Excluir</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>
        <div class="text-center">
            <a class="btn btn-sair" href="deslogar.php">SAIR</a>
        </div>
    </div>
</body>
</html>
