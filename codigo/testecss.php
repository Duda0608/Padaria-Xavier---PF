<?php
require_once("verificarlogado.php");
$adm = $_SESSION['adm'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">

</head>

<body class="bobyhome">

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">xavier★</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#">Página Inicial</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cardápio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Promoção</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pedidos</a></li>
                    <li class="nav-item"><i class="bi bi-person-circle icon-user"></i></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="herohome">
        <div>
            <h1>Padaria</h1>
            <p>Entre o aroma do café e o pão saindo do forno, nasce a magia do cotidiano.</p>
        </div>
    </section>

   

<style>
   
</style>


    <!-- Conteúdo -->
    <div class="container container-linkshome">
        <?php if ($adm == '1'): ?>
            <h4 class="text-center mb-4 text-success">Área Administrativa</h4>
            <ul>
                <li><a href="formusuario.php">Cadastrar Usuário</a></li>
                <li><a href="listarusuarios.php">Usuários Cadastrados</a></li>
                <li><a href="listarpedido.php">Pedidos Cadastrados</a></li>
                <li><a href="formprodutos.php">Cadastrar Produtos</a></li>
                <li><a href="listarprodutos.php">Produtos Cadastrados</a></li>
                <li><a href="formpromocao.php">Cadastrar Promoção</a></li>
                <li><a href="listarpromocao.php">Promoções Cadastradas</a></li>
                <li><a href="formcategoria.php">Cadastrar Categoria</a></li>
                <li><a href="listarcategoria.php">Categorias Cadastradas</a></li>
            </ul>
        <?php endif; ?>

        <h4 class="text-center mt-5 mb-4 text-success">Área do Cliente</h4>
        <ul>
            <li><a href="carrinho.php">Meu Carrinho</a></li>
            <li><a href="formcomentario.php">Cadastrar Comentário</a></li>
            <li><a href="listarcomentario.php">Listar Comentário</a></li>
            <li><a href="formpedido.php">Cadastrar Pedido</a></li>
            <li><a href="sobrenos.php">Sobre Nós</a></li>
        </ul>
        <section class="promocoes py-5">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h2 class="titulo-promocoes mb-4">
                            Conheça nossas<br>Promoções Especiais
                        </h2>
                        <p class="texto-promocoes mb-4">
                            Aproveite descontos exclusivos e produtos fresquinhos preparados com todo o carinho da Panificadora Xavier.
                        </p>
                        <a href="formpromocao.php" class="btn btn-promocoes">Ver Promoções</a>
                    </div>
                </div>
            </div>
        </section>

         <section class="categoriashome py-5">
    <div class="container text-center">
        <h2 class="titulo-categoriahome mb-3">Nossas categorias</h2>
        <p class="descricao-categoriahome mb-5">
            Explore nossas categorias e encontre o que há de melhor: pães frescos, croissants crocantes e muito mais.
        </p>

        <div class="row justify-content-center g-4">
            <!-- Pães -->
            <div class="col-6 col-md-4 col-lg-2">
                <a href="cardapio.php#paes" class="categoria-item d-block text-decoration-none">
                    <div class="categoria-box">
                        <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Pães" class="img-fluid mb-2" style="max-width: 70px;">
                        <p class="categoria-textohome">PÃES</p>
                    </div>
                </a>
            </div>

            <!-- Sanduíches e Salgados -->
            <div class="col-6 col-md-4 col-lg-2">
                <a href="cardapio.php#sanduiches" class="categoria-item d-block text-decoration-none">
                    <div class="categoria-box">
                        <img src="https://cdn-icons-png.flaticon.com/512/1046/1046784.png" alt="Sanduíches e Salgados" class="img-fluid mb-2" style="max-width: 70px;">
                        <p class="categoria-textohome">SANDUÍCHES E SALGADOS</p>
                    </div>
                </a>
            </div>

            <!-- Bolos -->
            <div class="col-6 col-md-4 col-lg-2">
                <a href="cardapio.php#bolos" class="categoria-item d-block text-decoration-none">
                    <div class="categoria-box">
                        <img src="https://cdn-icons-png.flaticon.com/512/3515/3515261.png" alt="Bolos" class="img-fluid mb-2" style="max-width: 70px;">
                        <p class="categoria-textohome">BOLOS</p>
                    </div>
                </a>
            </div>

            <!-- Café e Bebidas -->
            <div class="col-6 col-md-4 col-lg-2">
                <a href="cardapio.php#cafes" class="categoria-item d-block text-decoration-none">
                    <div class="categoria-box">
                        <img src="https://cdn-icons-png.flaticon.com/512/924/924514.png" alt="Café e Bebidas" class="img-fluid mb-2" style="max-width: 70px;">
                        <p class="categoria-textohome">CAFÉ E BEBIDAS</p>
                    </div>
                </a>
            </div>

            <!-- Doces Finos -->
            <div class="col-6 col-md-4 col-lg-2">
                <a href="cardapio.php#doces" class="categoria-item d-block text-decoration-none">
                    <div class="categoria-box">
                        <img src="https://cdn-icons-png.flaticon.com/512/3075/3075970.png" alt="Doces Finos" class="img-fluid mb-2" style="max-width: 70px;">
                        <p class="categoria-textohome">DOCES FINOS</p>
                    </div>
                </a>
            </div>

            <!-- Encomendas -->
            <div class="col-6 col-md-4 col-lg-2">
                <a href="cardapio.php#encomendas" class="categoria-item d-block text-decoration-none">
                    <div class="categoria-box">
                        <img src="https://cdn-icons-png.flaticon.com/512/3081/3081559.png" alt="Encomendas" class="img-fluid mb-2" style="max-width: 70px;">
                        <p class="categoria-textohome">ENCOMENDAS</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

      
        <div class="text-center mt-4">
            <a href="deslogar.php" class="btn-sairhome">Sair</a>
        </div>
    </div>

    <footer>
        <p>© 2025 Padaria Xavier - Todos os direitos reservados</p>
    </footer>

    <!-- Bootstrap JS + Ícones -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>

</html>