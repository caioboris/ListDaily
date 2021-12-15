<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificarProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function verificar(Request $request)
    {
        $codigo = $request->input('barcode');

        session()->put('codigo', $codigo);

        $produto = \DB::table('produtos')->where('codigo_de_barras', $codigo)->first();

        if($produto != null){
            session()->put('produto', $produto);
        }

        return redirect('lista')->with('status' , 'O produto foi escaneado');
    }

}
