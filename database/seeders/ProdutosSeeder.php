<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Inserindo Produtos
        $produtos = [

            // Entradas (categoria_id 1)
            ['nome' => 'Batata Frita', 'descricao' => null, 'preco' => 14.90, 'categoria_id' => 1, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Batata Gourmet', 'descricao' => 'Cheddar + Bacon', 'preco' => 18.90, 'categoria_id' => 1, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Anéis de Cebola', 'descricao' => 'Acompanha molho aioli ou BBQ (a sua escolha)', 'preco' => 18.90, 'categoria_id' => 1, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Tirinhas de Frango', 'descricao' => '15 unidades. Acompanha molho aioli ou BBQ (a sua escolha)', 'preco' => 19.90, 'categoria_id' => 1, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Dadinhos de Tapioca com Queijo Coalho', 'descricao' => '10 unidades. Acompanha geleia de pimenta', 'preco' => 20.90, 'categoria_id' => 1, 'imagem' => null, 'ativo' => true],


            // Burger Tradicionais (categoria_id 2)
            [
                'nome' => 'Basic',
                'descricao' => 'Pão batata, blend 160g, mussarela e BBQ ou aioli (à sua escolha).',
                'preco' => 21.90,
                'categoria_id' => 2,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Deluxe',
                'descricao' => 'Pão batata, blend 160g, mussarela, peperoni, molho pesto, cebola caramelizada e BBQ.',
                'preco' => 26.90,
                'categoria_id' => 2,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Clássico',
                'descricao' => 'Pão batata, blend 160g, mussarela, alface americana, tomate gratinado, cebola caramelizada, maionese e BBQ.',
                'preco' => 27.90,
                'categoria_id' => 2,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Realeza',
                'descricao' => 'Pão batata ou australiano, blend 160g, mussarela, molho aioli, crispy de queijo coalho, cebola caramelizada e BBQ.',
                'preco' => 27.90,
                'categoria_id' => 2,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Supreme Cheddar',
                'descricao' => 'Pão batata ou australiano, blend 160g, mussarela, molho cheddar, bacon, cebola caramelizada e BBQ.',
                'preco' => 28.90,
                'categoria_id' => 2,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Gran Finale',
                'descricao' => 'Pão batata, blend 160g, mussarela, tomate seco, molho pesto e cream cheese.',
                'preco' => 28.90,
                'categoria_id' => 2,
                'imagem' => null,
                'ativo' => true
            ],
            
            // Burger Premium (categoria_id 3)
            [
                'nome' => 'Supreme Aioli',
                'descricao' => 'Pão batata ou australiano, blend 160g, mussarela, molho aioli, bacon, cebola caramelizada e BBQ.',
                'preco' => 28.90,
                'categoria_id' => 3,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Queijo Coalho e Melaço',
                'descricao' => 'Pão batata ou australiano, blend 160g, queijo coalho maçaricado, orégano, melaço e molho aioli.',
                'preco' => 29.90,
                'categoria_id' => 3,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Onion King',
                'descricao' => 'Pão batata, blend 160g, mussarela, maionese, anéis de cebola e BBQ.',
                'preco' => 29.90,
                'categoria_id' => 3,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Cheddar and Cheese',
                'descricao' => 'Pão batata ou australiano, blend 160g, mussarela, molho cheddar, bacon, cream cheese, cebola caramelizada e BBQ.',
                'preco' => 30.90,
                'categoria_id' => 3,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Nordestino',
                'descricao' => 'Pão batata ou australiano, blend 160g, queijo coalho, molho aioli, banana da terra finalizado com melaço de cana.',
                'preco' => 30.90,
                'categoria_id' => 3,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Lord Crispy Cheddar',
                'descricao' => 'Pão batata ou australiano, blend 160g, mussarela, BBQ, bacon, cebola crispy e molho cheddar especial.',
                'preco' => 30.90,
                'categoria_id' => 3,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Aioli Crispy',
                'descricao' => 'Pão batata ou australiano, blend 160g, molho aioli, bacon, cebola crispy e BBQ.',
                'preco' => 31.90,
                'categoria_id' => 3,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Reino do Queijo',
                'descricao' => 'Pão batata, 2x blend 100g cada, 2x queijo do reino, molho aioli e BBQ.',
                'preco' => 34.90,
                'categoria_id' => 3,
                'imagem' => null,
                'ativo' => true
            ],


            // Burger Especiais (categoria_id 4)
            [
                'nome' => 'Medalhão',
                'descricao' => 'Pão batata, blend de frango macio 160g, mussarela, molho aioli, bacon, cebola caramelizada e BBQ.',
                'preco' => 27.90,
                'categoria_id' => 4,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Chicken Cream Cheese',
                'descricao' => 'Pão batata, blend de frango macio 160g, mussarela, cream cheese, bacon e BBQ.',
                'preco' => 27.90,
                'categoria_id' => 4,
                'imagem' => null,
                'ativo' => true
            ],
            [
                'nome' => 'Lacto Veggie (Vegetariano)',
                'descricao' => 'Pão vegano de abóbora, blend de soja com castanha-do-pará 180g, mussarela, cebola caramelizada, alface americana, tomate gratinado, maionese e BBQ.',
                'preco' => 30.90,
                'categoria_id' => 4,
                'imagem' => null,
                'ativo' => true
            ],     
            
            
            // Adicionais (categoria_id 5)
            ['nome' => 'Dobre Carne + Queijo','descricao' => null, 'preco' => 10.00, 'categoria_id' => 5, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Bacon','descricao' => null, 'preco' => 4.00, 'categoria_id' => 5, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Cream Cheese', 'descricao' => null, 'preco' => 4.00, 'categoria_id' => 5, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Molho Aioli', 'descricao' => null, 'preco' => 4.00, 'categoria_id' => 5, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Molho Cheddar', 'descricao' => null, 'preco' => 4.00, 'categoria_id' => 5, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Cebola Crispy', 'descricao' => null, 'preco' => 4.00, 'categoria_id' => 5, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Queijo Coalho', 'descricao' => null, 'preco' => 5.00, 'categoria_id' => 5, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Queijo do Reino', 'descricao' => null, 'preco' => 5.00, 'categoria_id' => 5, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Anéis de Cebola', 'descricao' => null, 'preco' => 5.00, 'categoria_id' => 5, 'imagem' => null, 'ativo' => true],

            // Bebidas (categoria_id 6)
            ['nome' => 'Refrigerante Lata', 'descricao' => 'Coca Cola, Coca Zero, Antártica', 'preco' => 6.00, 'categoria_id' => 6, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Refrigerante Litro', 'descricao' => 'Pepsi e Antártica', 'preco' => 9.00, 'categoria_id' => 6, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Água (500ml)', 'descricao' => null, 'preco' => 3.00, 'categoria_id' => 6, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Água com Gás', 'descricao' => null, 'preco' => 4.50, 'categoria_id' => 6, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Red Bull (269ml)', 'descricao' => null, 'preco' => 12.90, 'categoria_id' => 6, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Água Tônica', 'descricao' => null, 'preco' => 7.50, 'categoria_id' => 6, 'imagem' => null, 'ativo' => true],

            // Sucos (categoria_id 7)
            ['nome' => 'Suco de Laranja 300ml', 'descricao' => null, 'preco' => 8.90, 'categoria_id' => 7, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Suco de Laranja 500ml', 'descricao' => null, 'preco' => 10.90, 'categoria_id' => 7, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Suco de Morango 300ml', 'descricao' => null, 'preco' => 8.90, 'categoria_id' => 7, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Suco de Morango 500ml', 'descricao' => null, 'preco' => 10.90, 'categoria_id' => 7, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Laranja com Morango 300ml', 'descricao' => null, 'preco' => 10.90, 'categoria_id' => 7, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Laranja com Morango 500ml', 'descricao' => null, 'preco' => 12.90, 'categoria_id' => 7, 'imagem' => null, 'ativo' => true],

            // MilkShakes (categoria_id 8)
            ['nome' => 'Milkshake Alpino', 'descricao' => '330ml', 'preco' => 19.90, 'categoria_id' => 8, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Milkshake Morango', 'descricao' => '330ml', 'preco' => 19.90, 'categoria_id' => 8, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Milkshake Ninho com Nutella', 'descricao' => '330ml', 'preco' => 19.90, 'categoria_id' => 8, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Milkshake Ovomaltine', 'descricao' => '330ml', 'preco' => 19.90, 'categoria_id' => 8, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Milkshake Oreo', 'descricao' => '330ml', 'preco' => 19.90, 'categoria_id' => 8, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Milkshake Doce de Leite com Caramelo', 'descricao' => '330ml', 'preco' => 19.90, 'categoria_id' => 8, 'imagem' => null, 'ativo' => true],
            
            // Combos (categoria_id 8)
            ['nome' => 'Batata + Refri Lata', 'descricao' => 'Preços válidos somente na compra de qualquer burger', 'preco' => 19.90, 'categoria_id' => 9, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Batata Gourmet + Refri Lata', 'descricao' => 'Preços válidos somente na compra de qualquer burger', 'preco' => 22.90, 'categoria_id' => 9, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Anéis de Cebola + Refri Lata', 'descricao' => 'Preços válidos somente na compra de qualquer burger', 'preco' => 22.90, 'categoria_id' => 9, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Tirinhas de Frango + Refri Lata', 'descricao' => 'Preços válidos somente na compra de qualquer burger', 'preco' => 24.90, 'categoria_id' => 9, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Batata + Milkshake', 'descricao' => 'Preços válidos somente na compra de qualquer burger', 'preco' => 30.90, 'categoria_id' => 9, 'imagem' => null, 'ativo' => true]

        ];

        // DB::table('produtos')->insert($produtos);
    }
}
