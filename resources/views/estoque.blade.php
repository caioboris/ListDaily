@extends('layouts.app')

@section('content')

<div class="text-center">
<h2>@lang('estoque.stockh3')</h2>
<h5>@lang('estoque.stockh5')</h5>

</div>

<div class="text-center">
<button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    @lang('estoque.registerproduct')
</button>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('estoque.addproduct')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

<div class="card-body">
    <form method="POST" action="{{ route('estoque.adicionar') }}">
        {{ csrf_field() }}

        <input  type="hidden" name="id_usuario">

        <div class="form-group row">
            <label for="nome_produto" class="col-md-4 col-form-label text-md-right">@lang('estoque.productname')</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="nome_produto" value="{{ old('nome_produto') }}" required autocomplete="nome_produto" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="marca_produto" class="col-md-4 col-form-label text-md-right">@lang('estoque.productbrand')</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="marca_produto" value="{{ old('marca_produto') }}" required autocomplete="marca_produto">
            </div>
        </div>
        <div class="form-group row">
            <label for="quantidade" class="col-md-4 col-form-label text-md-right">@lang('estoque.productamount')</label>
            <div class="col-md-6">
                <input  type="number" class="form-control"  name="quantidade">
            </div>
        </div>

        <div class="form-group row">
            <label for="peso" class="col-md-4 col-form-label text-md-right">@lang('estoque.productweight')</label>

            <div class="col-md-6">
                <input  type="number" min="0" max="999" class="form-control"  name="peso">
            </div>
        </div>

        <div class="form-group row">
            <label for="medida" class="col-md-4 col-form-label text-md-right">@lang('estoque.productmeasure')</label>

            <div class="col-md-3">
                <select name="medida">
                    @foreach ($medida as $row)
                        <option value="{{$row->id}}">{{$row->medida}}</option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('estoque.closemodal')</button>
      <button type="submit" class="btn btn-primary">@lang('estoque.addmodal')</button>
    </div>
  </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js" integrity="sha512-ewfXo9Gq53e1q1+WDTjaHAGZ8UvCWq0eXONhwDuIoaH8xz2r96uoAYaQCm1oQhnBfRXrvJztNXFsTloJfgbL5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection
