@extends('layouts.app')

@section('content')

<div class="text-center">
<h2>@lang('minhaslistas.listh3')</h2>
<h5>@lang('minhaslistas.listh5')</h5>

</div>

<div class="text-center">
<button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    @lang('minhaslistas.createlist')
</button>
</div>

@if (session('status'))
    <script>
      alert(document.getElementById('status').value);
    </script>
@endif

<div class="m-3 d-flex flex-lg-wrap justify-content-center">
  <input type="hidden" id='status' value="{{ session('status') }}">
    @foreach ($listas as $key=>$data)
    <div class="card m-2" style="width: 20rem;">
        <div class="card-body">
          <h5 class="card-title">{{$data->lista_nome}}</h5>
          <p class="card-text">{{$data->lista_desc}}</p>
          
          <form method="POST" action="{{route('lista.deletar')}}">
            <button><a>Editar Lista</a></button>
            {{ csrf_field() }}
            <input type="hidden" name="id_lista" value="{{$data->id}}">
            <input type="hidden" name="user_id" value="{{$data->id_usuario}}">
            <button type="submit"><a>Deletar lista</a></button>
          </form>
          
        </div>
      </div>
    @endforeach
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('minhaslistas.newlist')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

<div class="card-body">
    <form method="POST" action="{{ route('lista.criar') }}">
        {{ csrf_field() }}

        <input type="hidden" name="criarLista" value="1">

        <div class="form-group row">
            <label for="nome_produto" class="col-md-4 col-form-label text-md-right">@lang('minhaslistas.listname')</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="nome_lista" value="{{ old('nome_lista') }}" required autocomplete="nome_lista" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="marca_produto" class="col-md-4 col-form-label text-md-right">@lang('minhaslistas.listdesc')</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="desc_lista" value="{{ old('desc_lista') }}" required autocomplete="desc_lista">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">@lang('minhaslistas.radio')</label>
            <div class="col-md-6">
                <select class="form-select form-select-lg mb-3" name="status_lista" value="{{ old('status_lista') }}" autocomplete="status_lista">
                    <option value='false' selected>Não</option>
                    <option value='true'>Sim</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('minhaslistas.closemodal')</button>
      <button type="submit" class="btn btn-primary">@lang('minhaslistas.addmodal')</button>
    </div>
  </div>
</div>
</div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js" integrity="sha512-ewfXo9Gq53e1q1+WDTjaHAGZ8UvCWq0eXONhwDuIoaH8xz2r96uoAYaQCm1oQhnBfRXrvJztNXFsTloJfgbL5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection