<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lista;
use Illuminate\Http\Request;

class CriarListaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function criar(Request $request)
    {

        $this->validate($request,[
            'nome_lista'=> 'required',
            'desc_lista' => 'required',
        ]);

            $lista = new Lista;

            $lista->lista_nome= $request->input('nome_lista');
            $lista->lista_desc= $request->input('desc_lista');
            $lista->lista_status= $request->input('status_lista');
            $lista->id_usuario = \Auth::user()->id;

            $lista->save();

            return redirect('minhasListas')->with('status' , 'A lista foi criada');
    }
}
