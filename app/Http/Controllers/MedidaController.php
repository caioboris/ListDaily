<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medidas;

class MedidaController extends Controller
{
    public function index(){
        $medida = Medidas::all();
        return view('estoque',['medida'=>$medida]);
    }


}
