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

        $listas = $this->retrieveListas();

        $listas = $listas->get();

        return view('minhaslistas', ['listas' => $listas]);
    }

    /*public function verifyIfTableIsShared($ids, $uid){
        $shared_users = [];

        $shared_users = explode(";", $ids);

        foreach($shared_users as $user){
            if($user == $uid){
                return true;
            }
        }
    }*/

    /*public function insertTest(){
        $user = User::find(4);
        $listasIds = [59,60,61];
        $user->listas()->syncWithoutDetaching($listasIds);
    }*/

    public function retrieveListas(){
        $listas = User::find(\Auth::user()->id);
        $listas = $listas->listas();
        return $listas;
    }

}
