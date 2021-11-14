<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lista;
use Illuminate\Http\Request;

class MinhasListasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        return view('minhaslistas');
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

            return redirect('minhasListas');
    }

    public function store(Request $request){
        $produto = new Produto;
        
        $produto = $request;

        $produto->save();

    }

}
