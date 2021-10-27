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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adicionar(Request $request)
    {
        $this->middleware('auth');

        $this->validate($request,[
            'nome_produto'=> 'required',
            'marca_produto' => 'required',
            'quantidade' => 'required',
            'peso' => 'required',
            'medida'=> 'required'
        ]);

            $produto = new Produto;

            $produto->user_id = Auth::user()->id;
            $produto->pdt_nome= $request->input('nome_produto');
            $produto->pdt_marca= $request->input('marca_produto');
            $produto->pdt_quantidade= $request->input('quantidade');
            $produto->pdt_peso= $request->input('peso');
            $produto->pdt_medida= $request->input('medida');

            $produto->save();

            return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function showEstoque($id)
    {
        $this->middleware('auth');

        $user = User::where('id',$id)->first();

        $produtos = $user->produtos()->get();

        if($produtos){
            echo "<h1>Produtos na sua Dispensa</h1>";

            foreach($produtos as $produto){
                echo "<p>{$produto->pdt_nome}, {$produto->pdt_quantidade}, {$produto->pdt_marca}, {$produto->pdt_peso}, {$produto->pdt_medida}</p>";
            }
        }
    }



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
