INSERT IGNORE INTO tb_produtos (nome, preco_venda, tbcategoria_idcategoria, foto) VALUES
('Pão Francês', 0.80, 1, 'pao_frances.jpeg'),
('Pão de Queijo', 2.50, 1, 'pao_queijo.jpeg'),
('Pão Integral', 1.80, 1, 'pao_integral.jpeg'),
('Croissant Manteiga', 4.50, 1, 'croissant_manteiga.jpeg'),
('Pão Australiano', 3.90, 1, 'pao_australiano.jpeg'),
('Baguete Tradicional', 5.00, 1, 'baguete_tradicional.jpeg'),
('Pão de Leite', 1.20, 1, 'pao_leite.jpeg'),
('Misto Quente', 6.50, 2, 'misto_quente.jpeg'),
('Sanduíche Natural de Frango', 8.90, 2, 'sanduiche_frango.jpeg'),
('Coxinha de Frango', 5.00, 2, 'coxinha_frango.jpeg'),
('Empada de Palmito', 4.50, 2, 'empada_palmito.jpeg'),
('Esfiha de Carne', 4.00, 2, 'esfiha_carne.jpeg'),
('Pão de Batata com Catupiry', 5.50, 2, 'pao_batata_catupiry.jpeg'),
('Quiche de Alho-Poró', 7.90, 2, 'quiche_alhoporo.jpeg'),
('Bolo de Cenoura com Chocolate', 6.00, 3, 'bolo_cenoura.jpeg'),
('Bolo de Fubá com Goiabada', 5.50, 3, 'bolo_fuba.jpeg'),
('Bolo de Chocolate Trufado', 8.90, 3, 'bolo_trufado.jpeg'),
('Bolo de Milho', 5.00, 3, 'bolo_milho.jpeg'),
('Bolo Red Velvet', 9.90, 3, 'bolo_redvelvet.jpeg'),
('Bolo de Laranja', 6.00, 3, 'bolo_laranja.jpeg'),
('Café Expresso', 4.00, 4, 'cafe_expresso.jpeg'),
('Cappuccino Tradicional', 6.50, 4, 'cappuccino.jpeg'),
('Café com Leite', 5.00, 4, 'cafe_com_leite.jpeg'),
('Chocolate Quente', 7.00, 4, 'chocolate_quente.jpeg'),
('Suco Natural de Laranja', 6.00, 4, 'suco_laranja.jpeg'),
('Água Mineral 500ml', 2.50, 4, 'agua_mineral.jpeg'),
('Refrigerante Lata', 5.00, 4, 'refrigerante.jpeg'),
('Brigadeiro Gourmet', 3.50, 5, 'brigadeiro_gourmet.jpeg'),
('Beijinho Tradicional', 3.00, 5, 'beijinho.jpeg'),
('Trufa de Chocolate Belga', 5.50, 5, 'trufa_belga.jpeg'),
('Mini Torta de Limão', 6.00, 5, 'mini_torta_limao.jpeg'),
('Camafeu de Nozes', 6.50, 5, 'camafeu_nozes.jpeg'),
('Bombom de Morango', 4.50, 5, 'bombom_morango.jpeg'),
('Mini Cheesecake Frutas Vermelhas', 7.90, 5, 'mini_cheesecake.jpeg');






INSERT INTO tb_categorias (idcategoria, nome, descricao) VALUES
(1, 'Pães', 'Variedades de pães frescos e artesanais'),
(2, 'Sanduíches e Salgados', 'Lanches, tortas e salgados prontos para saborear'),
(3, 'Bolos', 'Bolos caseiros e confeitados para todas as ocasiões'),
(4, 'Cafés e Bebidas', 'Cafés especiais, sucos e bebidas quentes ou geladas'),
(5, 'Doces Finos', 'Doces artesanais e sobremesas delicadas');
