<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function index()
    {
        $produto = $this->retrieve();
        return view('minhaslistas', ['produto' => $produtos]);
    }

    public function retrieve(){
        $this->middleware('auth');

        $uid = \Auth::user()->id;

        $listas = \DB::table('listas')->where('id_usuario', $uid)->get();

        $listass = collect($listas)
                        ->pluck('Lista','Lista')
                        ->toArray();

        return $listas;
    }

    public function adicionar(Request $request)
    {
        $this->middleware('auth');

        $this->validate($request,[
            'produto_nome' => 'required',
            'produto_obs',
            'produto_preco'
        ]);

            $produto = new Produto;

            $produto->id_lista = $request->input('id_lista');
            $produto->produto_nome= $request->input('produto_nome');
            $produto->produto_obs= $request->input('produto_obs');
            $produto->produto_preco= $request->input('produto_preco');

            $produto->save();

            return redirect('minhasListas')->with('status' , 'produto adicionado a sua lista');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
