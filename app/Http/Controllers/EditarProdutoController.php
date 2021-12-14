<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditarProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        if($request->input('produto_nome')){
            \DB::table('produto')->where('id', $request->input('id_produto'))->update(['produto_nome' => $request->input('produto_nome')]);
            \DB::table('produtos')->where('id', $request->input('id_produto'))->update(['produto_nome' => $request->input('produto_nome')]);
        }
        if($request->input('produto_obs')){
            \DB::table('produto')->where('id', $request->input('id_produto'))->update(['produto_obs' => $request->input('produto_obs')]);
            \DB::table('produtos')->where('id', $request->input('id_produto'))->update(['produto_obs' => $request->input('produto_obs')]);
        }
        if($request->input('produto_preco')){
            \DB::table('produto')->where('id', $request->input('id_produto'))->update(['produto_preco' => $request->input('produto_preco')]);
            \DB::table('produtos')->where('id', $request->input('id_produto'))->update(['produto_preco' => $request->input('produto_preco')]);
        }

        return redirect('lista')->with('status' , 'O produto foi editado');
    }

}
