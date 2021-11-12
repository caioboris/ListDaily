<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    public $fillable = [
        'produto_nome',
        'produto_obs',
        'produto_preco'
    ];


    public function produto()
    {
        return $this->belongsTo(Lista::class, 'id_lista', 'id');
    }

}
