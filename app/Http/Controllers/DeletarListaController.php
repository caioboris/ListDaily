<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lista;
use Illuminate\Http\Request;

class DeletarListaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function delete(Request $request){

        $this->middleware('auth');

        $lista = new Lista;

        $lista_sql = \DB::table('listas')->where('id', $request->input('id_lista'))->get();

        $lista->id = $lista_sql[0]->id;
        $lista->lista_nome = $lista_sql[0]->lista_nome;
        $lista->lista_desc = $lista_sql[0]->lista_desc;
        $lista->lista_status = $lista_sql[0]->lista_status;
        $lista->id_usuario = $lista_sql[0]->id_usuario;
        $lista->created_at = $lista_sql[0]->created_at;
        $lista->updated_at = $lista_sql[0]->updated_at;
        $lista->shared_users = $lista_sql[0]->shared_users;

        $lista_produto = $lista->produto();
        $lista_produto = $lista_produto->get();

        if(\Auth::user()->id == $request->input('user_id')){
            /*foreach ($lista_produto as $key => $value) {
                $value->delete();
            }*/

            \DB::table('listas')->where('id', $request->input('id_lista'))->delete();

            return redirect('home')->with('status' , 'A lista foi deletada');
        }else{
            return redirect('home')->with('status' , 'Você não é o criador dessa lista!');
        }
        
    }
}
