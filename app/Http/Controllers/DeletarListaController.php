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

        \DB::table('listas')->where('id', $request->input('id_lista'))->delete();

        return redirect('minhasListas')->with('status' , 'A lista foi deletada');
    }
}
