<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add Categorias 
        $categorias = [
            ['nome' => 'Entradas', 'ativo' => true],
            ['nome' => 'Burger Tradicionais', 'ativo' => true],
            ['nome' => 'Burger Premium', 'ativo' => true],
            ['nome' => 'Burger Especiais', 'ativo' => true],
            ['nome' => 'Adicionais', 'ativo' => true],
            ['nome' => 'Bebidas', 'ativo' => true],
            ['nome' => 'Sucos', 'ativo' => true],
            ['nome' => 'MilkShakes', 'ativo' => true],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
