<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    public $fillable = [
        'nome',
        'quantidade',
        'marca',
        'peso',
        'medida'
    ];


    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
