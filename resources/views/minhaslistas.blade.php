@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/app.js') }}"></script>

    <div class="text-center">
        <h2>@lang('minhaslistas.listh3')</h2>
        <h4>@lang('minhaslistas.listh5')</h4>

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

    <script>
        function setListaID(id) {
            document.getElementById('id_lista_editar').value = id;
        }
    </script>

    <div class="m-3 d-xl-flex flex-lg-wrap justify-content-center align-items-center">
        <input type="hidden" id='status' value="{{ session('status') }}">
        @foreach ($listas as $key => $data)
            <div class="card m-2" style="width: 30rem;">
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title">{{ $data->lista_nome }}</h5>
                        <p class="card-text">{{ $data->lista_desc }}</p>


                        <form method="POST" action="{{ route('lista.deletar') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_lista" value="{{ $data->id }}">
                            <input type="hidden" name="user_id" value="{{ $data->id_usuario }}">

                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                style="width:100%;"><a>@lang('minhaslistas.delete')</a></button>
                        </form>

                        <form>
                            <button type="button" class="btn btn-outline-danger btn-sm" style="width:100%;"
                                data-bs-toggle="modal" data-bs-target="#editarListaModal"
                                onclick="setListaID({{ $data->id }})">
                                @lang('minhaslistas.edit')
                            </button>
                        </form>

                        <form method="POST" action="{{ route('lista.store') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_lista" value="{{ $data->id }}">
                            <input type="hidden" name="lista_nome" value="{{ $data->lista_nome }}">
                            <input type="hidden" name="lista_desc" value="{{ $data->lista_desc }}">
                            <input type="hidden" name="lista_status" value="{{ $data->lista_status }}">
                            <input type="hidden" name="shared_users" value="{{ $data->shared_users }}">

                            <button type="submit" class="btn btn-outline-danger btn-sm" style="width:100%;">
                                @lang('minhaslistas.see')
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
                                    <textarea class="form-control rounded-0" name="desc_lista"
                                        value="{{ old('desc_lista') }}" rows="5" required autocomplete="desc_lista">

                                                                                                                                                                                                                                </textarea>
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

    <div class="modal fade" id="editarListaModal" tabindex="-1" aria-labelledby="editarListaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarListaModalLabel">@lang('minhaslistas.edit')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <form method="POST" action="{{ route('lista.update') }}">
                            {{ csrf_field() }}
                            <input type="hidden" id="id_lista_editar" name="id_lista">

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
                                    <textarea class="form-control rounded-0" name="desc_lista"
                                        value="{{ old('desc_lista') }}" rows="5" required autocomplete="desc_lista">

                                                                                                                                                                                                                                </textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">@lang('minhaslistas.closemodal')</button>
                                <button type="submit" class="btn btn-primary">@lang('minhaslistas.editbtn')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"
        integrity="sha512-ewfXo9Gq53e1q1+WDTjaHAGZ8UvCWq0eXONhwDuIoaH8xz2r96uoAYaQCm1oQhnBfRXrvJztNXFsTloJfgbL5Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection
