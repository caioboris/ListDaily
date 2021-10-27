@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">

<div class="container">
                <div class="row">
                    <div class="col fundo-a">
                        <a href="{{route('lista', auth()->user()->id)}}">Minhas Listas</a>
                    </div>
                    <div class="col">
                        <a href="">Agendar Tarefas</a>
                    </div>
                    <div class="col">
                        <a href="{{route('estoque')}}">Meu Depósito</a>
                    </div>
                </div>

            </div>
        </div>

<script src="{{asset('site/jquery.js')}}"></script>
<script src="{{asset('site/bootstrap.js')}}"></script>
@endsection
