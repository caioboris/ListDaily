<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lista;
use Illuminate\Http\Request;

class CompartilharListaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function compartilhar(Request $request)
    {

        $this->validate($request,[
            'usuario_email'=> 'required',
        ]);
            $usuario = \DB::table('users')->where('email', $request->input('usuario_email'))->first();

            $user = User::find($usuario->id);
            
            $user->listas()->syncWithoutDetaching($request->input('id_lista'));

            return redirect('lista')->with('status' , 'A lista foi compartilhada');


    }
}
