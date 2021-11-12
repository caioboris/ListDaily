<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;

    public $fillable = [
        'nome',

        'desc',
        'publica',
    ];


    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
        'lista_count'
    ];
}
