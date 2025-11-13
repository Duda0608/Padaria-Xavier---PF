<?php
require_once "conexao.php";

// INSERIR CATEGORIAS
$categorias = [
    [1, 'Pães', 'Variedades de pães frescos e artesanais'],
    [2, 'Sanduíches e Salgados', 'Lanches, tortas e salgados prontos para saborear'],
    [3, 'Bolos', 'Bolos caseiros e confeitados para todas as ocasiões'],
    [4, 'Cafés e Bebidas', 'Cafés especiais, sucos e bebidas quentes ou geladas'],
    [5, 'Doces Finos', 'Doces artesanais e sobremesas delicadas']
];

foreach ($categorias as $cat) {
    $sql = "INSERT IGNORE INTO tb_categorias (idcategoria, nome, descricao) VALUES ($cat[0], '$cat[1]', '$cat[2]')";
    mysqli_query($conexao, $sql);
}

// INSERIR PRODUTOS
$produtos = [
    ['Pão Francês', 0.80, 1, 'pao_frances.jpeg'],
    ['Pão de Queijo', 2.50, 1, 'pao_queijo.jpg'],
    ['Pão Integral', 1.80, 1, 'pao_integral.jpg'],
    ['Croissant Manteiga', 4.50, 1, 'croissant_manteiga.jpg'],
    ['Pão Australiano', 3.90, 1, 'pao_australiano.jpg'],
    ['Baguete Tradicional', 5.00, 1, 'baguete_tradicional.jpg'],
    ['Pão de Leite', 1.20, 1, 'pao_leite.jpg'],
    ['Misto Quente', 6.50, 2, 'misto_quente.jpg'],
    ['Sanduíche Natural de Frango', 8.90, 2, 'sanduiche_frango.jpg'],
    ['Coxinha de Frango', 5.00, 2, 'coxinha_frango.jpg'],
    ['Empada de Palmito', 4.50, 2, 'empada_palmito.jpg'],
    ['Esfiha de Carne', 4.00, 2, 'esfiha_carne.jpg'],
    ['Pão de Batata com Catupiry', 5.50, 2, 'pao_batata_catupiry.jpg'],
    ['Quiche de Alho-Poró', 7.90, 2, 'quiche_alhoporo.jpg'],
    ['Bolo de Cenoura com Chocolate', 6.00, 3, 'bolo_cenoura.jpg'],
    ['Bolo de Fubá com Goiabada', 5.50, 3, 'bolo_fuba.jpg'],
    ['Bolo de Chocolate Trufado', 8.90, 3, 'bolo_trufado.jpg'],
    ['Bolo de Milho', 5.00, 3, 'bolo_milho.jpg'],
    ['Bolo Red Velvet', 9.90, 3, 'bolo_redvelvet.jpg'],
    ['Bolo de Laranja', 6.00, 3, 'bolo_laranja.jpg'],
    ['Café Expresso', 4.00, 4, 'cafe_expresso.jpg'],
    ['Cappuccino Tradicional', 6.50, 4, 'cappuccino.jpg'],
    ['Café com Leite', 5.00, 4, 'cafe_com_leite.jpg'],
    ['Chocolate Quente', 7.00, 4, 'chocolate_quente.jpg'],
    ['Suco Natural de Laranja', 6.00, 4, 'suco_laranja.jpg'],
    ['Água Mineral 500ml', 2.50, 4, 'agua_mineral.jpg'],
    ['Refrigerante Lata', 5.00, 4, 'refrigerante.jpg'],
    ['Brigadeiro Gourmet', 3.50, 5, 'brigadeiro_gourmet.jpg'],
    ['Beijinho Tradicional', 3.00, 5, 'beijinho.jpg'],
    ['Trufa de Chocolate Belga', 5.50, 5, 'trufa_belga.jpg'],
    ['Mini Torta de Limão', 6.00, 5, 'mini_torta_limao.jpg'],
    ['Camafeu de Nozes', 6.50, 5, 'camafeu_nozes.jpg'],
    ['Bombom de Morango', 4.50, 5, 'bombom_morango.jpg'],
    ['Mini Cheesecake Frutas Vermelhas', 7.90, 5, 'mini_cheesecake.jpg']
];

foreach ($produtos as $p) {
    $sql = "INSERT IGNORE INTO tb_produtos (nome, preco_venda, tbcategoria_idcategoria, foto) 
            VALUES ('$p[0]', $p[1], $p[2], '$p[3]')";
    mysqli_query($conexao, $sql);
}

echo "Categorias e produtos inseridos com sucesso!";
?>
