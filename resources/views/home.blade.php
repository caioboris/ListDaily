@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">

<div class="container">
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
    </div>
    <div class="card-body">
        @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
      </div>
                    @endif
                <div class="row">
                    <div class="col fundo-a">
                        <a href="{{route('lista', auth()->user()->id)}}">Minhas Listas</a>
                    </div>
                    <div class="col">
                        <a href="">Agendar Tarefas</a>
                    </div>
                    <div class="col">
                        <a href="">Meu Depósito</a>
                    </div>
                </div>

            </div>
        </div>

<script src="{{asset('site/jquery.js')}}"></script>
<script src="{{asset('site/bootstrap.js')}}"></script>
@endsection
