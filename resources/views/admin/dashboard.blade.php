@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            Painel de Administração

           <a href="{{route('admin.logout')}}">Sair</a>
        </div>
    </div>
</div>
