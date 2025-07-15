<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'ativo'
    ];
    
    protected $table = 'adicionais';

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'adicional_produto');
    }
}
