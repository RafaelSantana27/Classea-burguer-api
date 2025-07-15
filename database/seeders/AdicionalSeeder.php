<?php

namespace Database\Seeders;

use App\Models\Adicional;
use Illuminate\Database\Seeder;

class AdicionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add Adicionais Reais 
        $adicionais = [
            ['nome' => 'Carne + Queijo',   'preco' => 10.00, 'ativo' => true],
            ['nome' => 'Bacon',            'preco' => 4.00,  'ativo' => true],
            ['nome' => 'Cream Cheese',     'preco' => 4.00,  'ativo' => true],
            ['nome' => 'Molho Aioli',      'preco' => 4.00,  'ativo' => true],
            ['nome' => 'Molho Cheddar',    'preco' => 4.00,  'ativo' => true],
            ['nome' => 'Cebola Crispy',    'preco' => 4.00,  'ativo' => true],
            ['nome' => 'Queijo Coalho',    'preco' => 5.00,  'ativo' => true],
            ['nome' => 'Queijo do Reino',  'preco' => 5.00,  'ativo' => true],
            ['nome' => 'Anéis de Cebola',  'preco' => 5.00,  'ativo' => true],

            //************* OUTROS FAKE *************//
            // Outros Adicionais para popular o banco **APAGUE DEPOIS***
            ['nome' => 'Picles Artesanal',        'preco' => 3.00, 'ativo' => true],
            ['nome' => 'Tomate Seco',             'preco' => 4.50, 'ativo' => true],
            ['nome' => 'Maionese Verde',          'preco' => 2.50, 'ativo' => true],
            ['nome' => 'Pepper Jack Cheese',      'preco' => 5.00, 'ativo' => true],
            ['nome' => 'Barbecue Defumado',       'preco' => 3.50, 'ativo' => true],
            ['nome' => 'Farofa de Bacon',         'preco' => 4.00, 'ativo' => true],
            ['nome' => 'Guacamole',               'preco' => 5.00, 'ativo' => true],
            ['nome' => 'Alho Confitado',          'preco' => 3.00, 'ativo' => true],
            ['nome' => 'Ovo Caipira',             'preco' => 4.00, 'ativo' => true],
            ['nome' => 'Molho de Gorgonzola',     'preco' => 5.00, 'ativo' => true],
        ];

        foreach ($adicionais as $adicional) {
            Adicional::create($adicional);
        }
    }
}
