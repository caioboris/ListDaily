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

        if(\Auth::user()->id == $request->input('user_id')){
            \DB::table('listas')->where('id', $request->input('id_lista'))->delete();
            return redirect('minhasListas')->with('status' , 'A lista foi deletada');
        }else{
            return redirect('minhasListas')->with('status' , 'Você não é o criador dessa lista!');
        }
        
    }
}
