<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lista;
use Illuminate\Http\Request;

class StoreListaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

            $lista = new Lista;

            $lista->id = $request->input('id_lista');
            $lista->lista_nome = $request->input('lista_nome');
            $lista->lista_desc = $request->input('lista_desc');
            $lista->lista_status = $request->input('lista_status');

            session()->put('data', $lista);

            return redirect()->route('lista.page');


    }
}
