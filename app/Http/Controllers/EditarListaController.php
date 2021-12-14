<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lista;
use Illuminate\Http\Request;

class EditarListaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editar(Request $request)
    {

        $this->validate($request,[
            'nome_lista'=> 'required',
            'desc_lista' => 'required',
        ]);

            $update = ['lista_nome' => $request->input('nome_lista'), 'lista_desc' => $request->input('desc_lista'), 'lista_status' => $request->input('status_lista')];

            \DB::table('listas')->where('id', $request->input('id_lista'))->update($update);

            return redirect('minhasListas')->with('status' , 'A lista foi editada');


    }
}
