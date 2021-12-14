@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h2>@lang('minhaslistas.listh3')</h2>
        <h5>@lang('minhaslistas.listh5')</h5>

    </div>

    <div class="text-center">
        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
            data-bs-target="#createListaModal">
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
        @foreach ($listas as $key => $data)
            <div class="card m-2" style="width: 20rem;">
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title">{{ $data->lista_nome }}</h5>
                        <p class="card-text">{{ $data->lista_desc }}</p>


                        <form method="POST" action="{{ route('lista.deletar') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_lista" value="{{ $data->id }}">
                            <input type="hidden" name="user_id" value="{{ $data->id_usuario }}">

                            <button type="submit" class="btn btn-outline-danger btn-sm" style="width:100%;"><a>Deletar
                                    lista</a></button>
                        </form>

                        <form>
                            <button type="button" class="btn btn-outline-danger btn-sm" style="width:100%;"
                                data-bs-toggle="modal" data-bs-target="#updateListaModal">
                                Editar Lista
                            </button>
                        </form>

                        <form method="POST" action="{{ route('lista.store') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_lista" value="{{ $data->id }}">
                            <input type="hidden" name="lista_nome" value="{{ $data->lista_nome }}">
                            <input type="hidden" name="lista_desc" value="{{ $data->lista_desc }}">
                            <input type="hidden" name="lista_status" value="{{ $data->lista_status }}">

                            <button type="submit" class="btn btn-outline-danger btn-sm" style="width:100%;">
                                Ver Lista
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="modal fade" id="createListaModal" tabindex="-1" aria-labelledby="createListaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createListaModalLabel">@lang('minhaslistas.newlist')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <form method="POST" action="{{ route('lista.criar') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="criarLista" value="1">

                            <div class="form-group row">
                                <label for="nome_lista"
                                    class="col-md-4 col-form-label text-md-right">@lang('minhaslistas.listname')</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nome_lista"
                                        value="{{ old('nome_lista') }}" required autocomplete="nome_lista" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="desc_lista"
                                    class="col-md-4 col-form-label text-md-right">@lang('minhaslistas.listdesc')</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="desc_lista"
                                        value="{{ old('desc_lista') }}" required autocomplete="desc_lista">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">@lang('minhaslistas.radio')</label>
                                <div class="col-md-4">
                                    <select class="form-select form-select-lg mb-3" name="status_lista"
                                        value="{{ old('status_lista') }}" autocomplete="status_lista">
                                        <option value='false' selected>Não</option>
                                        <option value='true'>Sim</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">@lang('minhaslistas.closemodal')</button>
                                <button type="submit" class="btn btn-primary">@lang('minhaslistas.addmodal')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="updateListaModal" tabindex="-1" aria-labelledby="createListaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createListaModalLabel">@lang('minhaslistas.newlist')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <form method="POST" action="{{ route('lista.editar') }}">
                            {{ csrf_field() }}
                            <input type="hidden" id="currentLista" name="id_lista" value="">
                            <div class="form-group row">
                                <label for="produto_nome" class="col-md-4 col-form-label text-md-right">Nome do
                                    Produto</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="produto_nome"
                                        value="{{ old('produto_nome') }}" required autocomplete="produto_nome" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="produto_obs" class="col-md-4 col-form-label text-md-right">Observação</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="produto_obs"
                                        value="{{ old('produto_obs') }}" required autocomplete="produto_obs">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Último Preço</label>
                                <div class="col-md-4">
                                    <input type="decimal" class="form-control" name="produto_preco"
                                        value="{{ old('produto_preco') }}" required autocomplete="produto_preco">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">@lang('minhaslistas.closemodal')</button>
                                <button type="submit" class="btn btn-primary">@lang('minhaslistas.addmodal')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}

    <div class="modal fade" id="createListaModal" tabindex="-1" aria-labelledby="updateListaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createListaModalLabel">@lang('minhaslistas.newlist')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <form method="POST" action="{{ route('lista.criar') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="criarLista" value="1">

                            <div class="form-group row">
                                <label for="nome_lista"
                                    class="col-md-4 col-form-label text-md-right">@lang('minhaslistas.listname')</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nome_lista"
                                        value="{{ old('nome_lista') }}" required autocomplete="nome_lista" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="desc_lista"
                                    class="col-md-4 col-form-label text-md-right">@lang('minhaslistas.listdesc')</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="desc_lista"
                                        value="{{ old('desc_lista') }}" required autocomplete="desc_lista">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">@lang('minhaslistas.radio')</label>
                                <div class="col-md-4">
                                    <select class="form-select form-select-lg mb-3" name="status_lista"
                                        value="{{ old('status_lista') }}" autocomplete="status_lista">
                                        <option value='false' selected>Não</option>
                                        <option value='true'>Sim</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">@lang('minhaslistas.closemodal')</button>
                                <button type="submit" class="btn btn-primary">@lang('minhaslistas.addmodal')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="selectListaModal" tabindex="-1" aria-labelledby="selectListaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createListaModalLabel">@lang('minhaslistas.newlist')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nome do Produto</th>
                                    <th scope="col">Observação</th>
                                    <th scope="col">Último Preço</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">@lang('minhaslistas.closemodal')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"
        integrity="sha512-ewfXo9Gq53e1q1+WDTjaHAGZ8UvCWq0eXONhwDuIoaH8xz2r96uoAYaQCm1oQhnBfRXrvJztNXFsTloJfgbL5Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection
