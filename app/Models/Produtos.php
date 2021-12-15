<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $table = "produtos";

    public $fillable = [
        'id',
        'codigo_de_barras',
        'produto_nome',
        'produto_obs',
        'produto_preco',
        'id_lista'
    ];

}
