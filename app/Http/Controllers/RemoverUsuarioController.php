<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lista;
use Illuminate\Http\Request;

class RemoverUsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function removerUsuario(Request $request){

        $this->middleware('auth');

        $user = User::find($request->input('usuario_id'));
        $user->listas()->detach($request->input('id_lista'));
        
        return redirect('lista')->with('status' , 'O usuário foi removido');
    }
}
