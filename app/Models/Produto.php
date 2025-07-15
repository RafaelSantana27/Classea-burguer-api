<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'categoria_id',
        'imagem',
        'ativo'
    ];

    public function categoria() 
    {
        return $this->belongsTo(Categoria::class);
    }

    public function adicionais()
    {
        return $this->belongsToMany(Adicional::class, 'adicional_produto');
    }

}
