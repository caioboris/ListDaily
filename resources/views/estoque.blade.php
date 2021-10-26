@extends('layouts.app')

@section('content')

<div class="card-body">
    <form method="POST" action="">
        @csrf

        <div class="form-group row">
            <label for="nome_produto" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Produto') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome_produto" value="{{ old('nome_produto') }}" required autocomplete="nome_produto" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="marca_produto" class="col-md-4 col-form-label text-md-right">{{ __('Marca do Produto') }}</label>

            <div class="col-md-6">
                <input id="marca_produto" type="text" class="form-control @error('marca_produto') is-invalid @enderror" name="marca_produto" value="{{ old('marca_produto') }}" required autocomplete="marca_produto">

                @error('marca_produto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="M" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
