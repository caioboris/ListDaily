<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = "produto";

    public $fillable = [
        'produto_nome',
        'produto_obs',
        'produto_preco'
    ];

    public function listas()
    {
        return $this->belongsToMany(Lista::class, 'listas_produto');
    }

}
