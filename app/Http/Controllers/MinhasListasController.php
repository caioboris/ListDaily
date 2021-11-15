<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lista;
use Illuminate\Http\Request;

class MinhasListasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $listas = $this->retrieve();
        return view('minhaslistas', ['listas' => $listas]);
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

}
