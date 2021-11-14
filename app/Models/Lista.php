<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $table = 'listas';

    public $fillable = [
        'lista_nome',
        'lista_desc',
        'lista_status',
        'id_usuario',
    ];


    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
