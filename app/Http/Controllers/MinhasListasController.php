<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use Illuminate\Http\Request;

class MinhasListasControlLer extends Controller
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
        $this->middleware('auth');

        $this->validate($request,[
            'nome_lista'=> 'required',
            'desc_lista' => 'required',
            'radio_lista' => 'required',
        ]);

            $lista = new Lista;

            $lista->user_id = \Auth::user()->id;
            $lista->nome_lista= $request->input('nome_lista');
            $lista->desc_lista= $request->input('desc_lista');
            $lista->radio_lista= $request->input('radio_lista');

            $lista->save();

            return redirect('minhaslistas');
    }

    public function store(Request $request){
        $produto = new Produto;
        
        $produto = $request;

        $produto->save();

    }

}
