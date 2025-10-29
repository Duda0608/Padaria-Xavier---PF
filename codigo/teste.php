<?php
require_once "verificarlogado.php";
require_once "funcoes.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio - Xavier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
            font-family: 'Inter', sans-serif;
        }
        .navbar {
            background-color: #2E4A2B;
        }
        .navbar-brand {
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
        }
        .navbar-brand span {
            color: #c4a574;
        }
        .nav-link {
            color: #fff !important;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }
        .banner {
            background-image: url('img/banner-cafe.jpg');
            background-size: cover;
            background-position: center;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            background-color: rgba(0,0,0,0.4);
        }
        .categoria {
            font-weight: bold;
            color: #2E4A2B;
            margin-top: 30px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .produto-card {
            border: none;
            text-align: center;
            background-color: #fff;
        }
        .produto-card img {
            width: 100%;
            border-radius: 4px;
        }
        .produto-nome {
            font-weight: 600;
            margin-top: 10px;
            text-transform: uppercase;
            font-size: 0.9rem;
        }
        .produto-preco {
            color: #2E4A2B;
            font-weight: bold;
        }
        .btn-add {
            background-color: #2E4A2B;
            color: #fff;
            border: none;
            margin-top: 5px;
            padding: 5px 10px;
            border-radius: 4px;
        }
        .btn-add:hover {
            background-color: #c4a574;
        }
        .pedido-box {
            background-color: #f8f5f0;
            padding: 20px;
            border-radius: 8px;
            margin-top: 40px;
        }
        .btn-custom {
            background-color: #2E4A2B;
            color: #fff;
            border: none;
        }
        .btn-custom:hover {
            background-color: #c4a574;
        }
        .list-group-item.active {
            background-color: #2E4A2B;
            border-color: #2E4A2B;
        }
        #mensagemFinal {
            display: none;
            background-color: #e8dcc0;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            color: #2E4A2B;
            font-weight: bold;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">xavier<span>*</span></a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#">Página Inicial</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Cardápio</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Promoção</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Pedidos</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="banner">
    <div>Cardápio<br><small style="font-size:1rem;">Confira nossos produtos</small></div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-md-3">
            <input type="text" class="form-control mb-3" placeholder="O que você procura?">
            <ul class="list-group" id="categorias">
                <li class="list-group-item active" data-categoria="paes">Pães</li>
                <li class="list-group-item" data-categoria="sanduiches">Sanduíches e Salgados</li>
                <li class="list-group-item" data-categoria="bolos">Bolos</li>
                <li class="list-group-item" data-categoria="bebidas">Café e Bebidas</li>
                <li class="list-group-item" data-categoria="doces">Doces Finos</li>
            </ul>
        </div>

        <div class="col-md-9">
            <div id="produtos" class="row g-4"></div>

            <div class="pedido-box mt-5" id="carrinhoBox">
                <h5 class="text-center mb-4">Carrinho</h5>
                <ul id="listaCarrinho" class="list-group mb-3"></ul>
                <div class="text-center mb-3">
                    <strong>Valor Total:</strong> R$ <span id="valorTotal">0,00</span>
                </div>
                <div class="text-center">
                    <button id="finalizarPedido" class="btn btn-custom px-5 py-2">Finalizar Pedido</button>
                </div>
            </div>

            <div id="mensagemFinal" class="mt-4">
                Pedido sendo preparado...<br>
                <a href="#" class="text-decoration-none" style="color:#2E4A2B;">Rastrear pedido</a>
            </div>
        </div>
    </div>
</div>

<script>
const produtos = {
    paes: [
        {nome: "Pão Francês", preco: 10.00, img: "img/pao1.jpg"},
        {nome: "Pão Integral", preco: 12.00, img: "img/pao2.jpg"},
        {nome: "Pão de Queijo", preco: 11.00, img: "img/pao3.jpg"},
        {nome: "Croissant Simples", preco: 14.00, img: "img/pao4.jpg"},
        {nome: "Pão Doce com Coco Ralado", preco: 13.00, img: "img/pao5.jpg"}
    ],
    sanduiches: [
        {nome: "Misto Quente", preco: 15.00, img: "img/sanduiche1.jpg"},
        {nome: "Sanduíche Natural", preco: 14.00, img: "img/sanduiche2.jpg"},
        {nome: "Bauru", preco: 16.00, img: "img/sanduiche3.jpg"},
        {nome: "Coxinha de Frango", preco: 9.00, img: "img/salgado1.jpg"},
        {nome: "Empada", preco: 8.00, img: "img/salgado2.jpg"},
        {nome: "Pastel Assado", preco: 10.00, img: "img/salgado3.jpg"}
    ],
    bolos: [
        {nome: "Fatia de Bolo de Chocolate", preco: 9.00, img: "img/bolo1.jpg"},
        {nome: "Bolo Red Velvet", preco: 12.00, img: "img/bolo2.jpg"},
        {nome: "Bolo Inteiro Caseiro", preco: 35.00, img: "img/bolo3.jpg"},
        {nome: "Cheesecake", preco: 14.00, img: "img/bolo4.jpg"}
    ],
    bebidas: [
        {nome: "Café Coado", preco: 6.00, img: "img/bebida1.jpg"},
        {nome: "Café Expresso", preco: 7.00, img: "img/bebida2.jpg"},
        {nome: "Capuccino", preco: 9.00, img: "img/bebida3.jpg"},
        {nome: "Chocolate Quente", preco: 10.00, img: "img/bebida4.jpg"},
        {nome: "Suco Natural de Laranja", preco: 8.00, img: "img/bebida5.jpg"},
        {nome: "Coca-Cola", preco: 6.00, img: "img/bebida6.jpg"},
        {nome: "Guaraná", preco: 6.00, img: "img/bebida7.jpg"},
        {nome: "Água Mineral com Gás", preco: 4.00, img: "img/bebida8.jpg"},
        {nome: "Água Mineral sem Gás", preco: 4.00, img: "img/bebida9.jpg"}
    ],
    doces: [
        {nome: "Brigadeiro Gourmet", preco: 5.00, img: "img/doce1.jpg"},
        {nome: "Camafeu de Nozes", preco: 6.00, img: "img/doce2.jpg"},
        {nome: "Mini Torta de Limão", preco: 7.00, img: "img/doce3.jpg"},
        {nome: "Trufa Artesanal", preco: 6.00, img: "img/doce4.jpg"},
        {nome: "Bombom de Uva", preco: 5.00, img: "img/doce5.jpg"}
    ]
};

let carrinho = [];

function carregarProdutos(categoria) {
    const container = document.getElementById('produtos');
    container.innerHTML = '';
    produtos[categoria].forEach((p, index) => {
        container.innerHTML += `
            <div class="col-md-4">
                <div class="produto-card">
                    <img src="${p.img}" alt="${p.nome}">
                    <div class="produto-nome">${p.nome}</div>
                    <div class="produto-preco">R$ ${p.preco.toFixed(2).replace('.', ',')}</div>
                    <button class="btn-add" onclick="adicionarCarrinho('${p.nome}', ${p.preco})">Adicionar</button>
                </div>
            </div>
        `;
    });
}

function adicionarCarrinho(nome, preco) {
    carrinho.push({nome, preco});
    atualizarCarrinho();
}

function atualizarCarrinho() {
    const lista = document.getElementById('listaCarrinho');
    const total = document.getElementById('valorTotal');
    lista.innerHTML = '';
    let soma = 0;
    carrinho.forEach(item => {
        lista.innerHTML += `<li class="list-group-item d-flex justify-content-between">${item.nome}<span>R$ ${item.preco.toFixed(2).replace('.', ',')}</span></li>`;
        soma += item.preco;
    });
    total.textContent = soma.toFixed(2).replace('.', ',');
}

document.querySelectorAll('#categorias .list-group-item').forEach(item => {
    item.addEventListener('click', function() {
        document.querySelectorAll('#categorias .list-group-item').forEach(i => i.classList.remove('active'));
        this.classList.add('active');
        carregarProdutos(this.dataset.categoria);
    });
});

document.getElementById('finalizarPedido').addEventListener('click', () => {
    document.getElementById('carrinhoBox').style.display = 'none';
    document.getElementById('mensagemFinal').style.display = 'block';
});

carregarProdutos('paes');
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

Esse código mantém o mesmo layout e estilo da versão anterior, mas agora:

Cada produto pode ser adicionado automaticamente ao carrinho.
O carrinho mostra os itens e o valor total.
Ao clicar em Finalizar Pedido, aparece a mensagem “Pedido sendo preparado... Rastrear pedido”.