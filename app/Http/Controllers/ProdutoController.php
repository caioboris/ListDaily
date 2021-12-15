<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produto;
use App\Models\Produtos;
use App\Models\Lista;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        //$produtos = $this->retrieveProdutos();

        $usuarios = $this->retrieveCompartilhados();

        $produtos = $this->retrieveProdutos();

        $produtos = $produtos->get();

        $lista = session()->get('data');

        $lista = (object) ['id' => $lista->id, 'lista_nome' => $lista->lista_nome, 'lista_desc' => $lista->lista_desc, 'lista_status' => $lista->lista_status];

        return view('lista', ['data' => $lista, 'produtos' => $produtos, 'compartilhados' => $usuarios]);
    }

    public function retrieveProdutos(){
        $lista = session()->get('data');

        $lista = (object) ['id' => $lista->id, 'lista_nome' => $lista->lista_nome, 'lista_desc' => $lista->lista_desc, 'lista_status' => $lista->lista_status];

        $produtos = Lista::find($lista->id);

        $produtos = $produtos->produto();

        return $produtos;
    }

    public function retrieveCompartilhados(){
        $lista = session()->get('data');

        $lista = (object) ['id' => $lista->id, 'lista_nome' => $lista->lista_nome, 'lista_desc' => $lista->lista_desc, 'lista_status' => $lista->lista_status];

        $usuarios = Lista::find($lista->id);
        $usuarios = $usuarios->usuario();
        return $usuarios->get();
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

            $produto->codigo_de_barras = $request->input('codigo_de_barras');
            $produto->id_lista= $request->input('id_lista');
            $produto->produto_nome= $request->input('produto_nome');
            $produto->produto_obs= $request->input('produto_obs');
            $produto->produto_preco= $request->input('produto_preco');

            $produto::updateOrCreate(
                ['codigo_de_barras' => $produto->codigo_de_barras],
                ['produto_nome' => $produto->produto_nome,'id_lista' => $produto->id_lista , 'produto_obs' => $produto->produto_obs, 'produto_preco' => $produto->produto_preco]
            );

            $produtoId= \DB::table('produto')->where('produto_nome', $request->input('produto_nome'))->latest('updated_at')->first();

            $produtos = new Produtos;
            
            $produtos->codigo_de_barras = $produto->codigo_de_barras;
            $produtos->id = $produtoId->id;
            $produtos->id_lista = $produto->id_lista;
            $produtos->produto_nome = $produto->produto_nome;
            $produtos->produto_obs = $produto->produto_obs;
            $produtos->produto_preco = $produto->produto_preco;

            \DB::unprepared('SET IDENTITY_INSERT produtos ON');
            $produtos::updateOrCreate(
                ['codigo_de_barras' => $produtos->codigo_de_barras],
                ['id' => $produtos->id, 'id_lista' => $produtos->id_lista, 'produto_nome' => $produtos->produto_nome, 'produto_obs' => $produtos->produto_obs, 'produto_preco' => $produtos->produto_preco]
            );

            $lista = Lista::find($request->input('id_lista'));
            $lista->produto()->syncWithoutDetaching($produtoId->id);

            return redirect('lista')->with('status' , 'Produto adicionado a sua lista');
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
    public function update(Request $request)
    {
        dd($request->input('produto_obs'));
            $update = ['lista_nome' => $request->input('nome_lista'), 'lista_desc' => $request->input('desc_lista'), 'lista_status' => $request->input('status_lista')];

            \DB::table('listas')->where('id', $request->input('id_lista'))->update($update);

            return redirect('lista')->with('status' , 'A lista foi editada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){

        $this->middleware('auth');

        \DB::table('produto')->where('id', $request->input('id_produto'))->delete();

        return redirect('lista')->with('status' , 'O produto foi removido');
        
    }
}
