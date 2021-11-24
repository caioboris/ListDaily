<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;

    public $fillable = [
        'lista_nome',
        'lista_desc',
        'lista_status',
        'id_usuario',
    ];


    public function usuario()
    {
        return $this->belongsToMany(User::class, 'listas_usuario');
    }

    public function produto()
    {
        return $this->belongsToMany(Produto::class, 'listas_produto');
    }
}
