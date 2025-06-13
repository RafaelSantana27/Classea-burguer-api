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
        // INSERIR DEPOIS TODOS OS ITENS CORRETOS *APENAS EXEMPLO*

        // Inserindo Produtos
        $produtos = [
            // Entradas (categoria_id 1)
            ['nome' => 'Suco 300ml', 'descricao' => 'Vários sabores', 'preco' => 3.00, 'categoria_id' => 1, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Suco 500ml', 'descricao' => 'Vários sabores', 'preco' => 5.00, 'categoria_id' => 1, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Suco 1 litro', 'descricao' => 'Vários sabores', 'preco' => 10.00, 'categoria_id' => 1, 'imagem' => null, 'ativo' => true],
            
            // Burger Tradicionais (categoria_id 2)
            ['nome' => 'Misto Quente', 'descricao' => null, 'preco' => 6.00, 'categoria_id' => 2, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Cachorro Quente', 'descricao' => null, 'preco' => 6.00, 'categoria_id' => 2, 'imagem' => null, 'ativo' => true],
            ['nome' => 'X-Salada', 'descricao' => null, 'preco' => 10.00, 'categoria_id' => 2, 'imagem' => null, 'ativo' => true],
            
            // Burger Premium (categoria_id 3)
            ['nome' => 'Pastel', 'descricao' => 'Carne, queijo, frango, calabresa, pizza, misto, palmito, camarão, cupuaçu com chocolate', 'preco' => 6.00, 'categoria_id' => 3, 'imagem' => null, 'ativo' => true],

            // Burger Especiais (categoria_id 4)
            ['nome' => 'Tapioca de Manteiga', 'descricao' => null, 'preco' => 4.00, 'categoria_id' => 4, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Tapioca de Coco', 'descricao' => null, 'preco' => 5.00, 'categoria_id' => 4, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Tapioca de Queijo', 'descricao' => null, 'preco' => 6.00, 'categoria_id' => 4, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Tapioca de Carne', 'descricao' => null, 'preco' => 7.00, 'categoria_id' => 4, 'imagem' => null, 'ativo' => true],
           
            // Adicionais (categoria_id 5)
            ['nome' => 'Tapioca Chocolate', 'descricao' => null, 'preco' => 6.00, 'categoria_id' => 5, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Tapioca Chocolate com Banana', 'descricao' => null, 'preco' => 7.00, 'categoria_id' => 5, 'imagem' => null, 'ativo' => true],
             
            // Bebidas (categoria_id 6)
            ['nome' => 'Tapioca Chocolate', 'descricao' => null, 'preco' => 6.00, 'categoria_id' => 6, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Tapioca Chocolate com Banana', 'descricao' => null, 'preco' => 7.00, 'categoria_id' => 6, 'imagem' => null, 'ativo' => true],
             
            // Sucos (categoria_id 7)
            ['nome' => 'Tapioca Chocolate', 'descricao' => null, 'preco' => 6.00, 'categoria_id' => 7, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Tapioca Chocolate com Banana', 'descricao' => null, 'preco' => 7.00, 'categoria_id' => 7, 'imagem' => null, 'ativo' => true],
            
            // MilkShakes (categoria_id 8)
            ['nome' => 'Tapioca Chocolate', 'descricao' => null, 'preco' => 6.00, 'categoria_id' => 8, 'imagem' => null, 'ativo' => true],
            ['nome' => 'Tapioca Chocolate com Banana', 'descricao' => null, 'preco' => 7.00, 'categoria_id' => 8, 'imagem' => null, 'ativo' => true],
            
        ];

        DB::table('produtos')->insert($produtos);
    }
}
