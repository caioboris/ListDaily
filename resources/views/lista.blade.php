@extends('layouts.app')

@section('content')

    <script>
        function setProdutoID(id) {
            document.getElementById('currentProduto').value = id;
        }
    </script>

    <body class="antialiased">
    <link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">
        <div class="text-center">
            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal">
            <a href="{{route('lista')}}">@lang('home.mylists')</a>
            </button>
        </div>

        <div class="text-center">
            <h1>{{ $data->lista_nome }}</h1>
            <p>{{ $data->lista_desc }}</p>
        </div>

        <button type="button" class="btn btn-outline-danger btn-sm" style="width:100%;" data-toggle="modal"
            data-target="#updateListaModal">
            Adicionar Produtos
        </button>

        <table class="table table-striped" style="width: 90%; margin: auto">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Último Preço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            @foreach ($produtos as $key => $value)
                <tr>
                    <td scope="row"></td>
                    <td>{{ $value->produto_nome }}</td>
                    <td>{{ $value->produto_obs }}</td>
                    <td>R${{ $value->produto_preco }}</td>
                    <td>
                        <form method="POST" action="{{ route('produto.remover') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_produto" value={{ $value->id }}>
                            <button type="submit" class="btn btn-outline-danger btn-sm" style="width:2rem;">X</button>
                        </form>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-outline-danger btn-sm" style="width:2rem;"
                            onclick="setProdutoID({{ $value->id }})" data-toggle="modal"
                            data-target="#updateProdutoModal">E</button>
                    </td>
                </tr>
            @endforeach
            <tbody>

            </tbody>
        </table>

        <div class="modal fade" id="updateListaModal" tabindex="-1" aria-labelledby="updateListaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateListaModal">@lang('minhaslistas.newlist')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">
                            <form method="POST" action="{{ route('lista.editar') }}">
                                {{ csrf_field() }}
                                <input type="hidden" id="currentLista" name="id_lista" value={{ $data->id }}>
                                <div class="form-group row">
                                    <label for="produto_nome" class="col-md-4 col-form-label text-md-right">Nome do
                                        Produto</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="produto_nome"
                                            value="{{ old('produto_nome') }}" required autocomplete="produto_nome"
                                            autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="produto_obs"
                                        class="col-md-4 col-form-label text-md-right">Observação</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="produto_obs"
                                            value="{{ old('produto_obs') }}" autocomplete="produto_obs">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Último Preço</label>
                                    <div class="col-md-4">
                                        <input type="decimal" class="form-control" name="produto_preco"
                                            value="{{ old('produto_preco') }}" autocomplete="produto_preco">
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

        <div class="modal fade" id="updateProdutoModal" tabindex="-1" aria-labelledby="updateProdutoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateProdutoModal">@lang('minhaslistas.newlist')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">
                            <form method="POST" action="{{ route('produto.editar') }}">
                                {{ csrf_field() }}
                                <input type="hidden" id="currentProduto" name="id_produto">
                                <div class="form-group row">
                                    <label for="produto_nome" class="col-md-4 col-form-label text-md-right">Nome do
                                        Produto</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="produto_nome"
                                            value="{{ old('produto_nome') }}" autocomplete="produto_nome" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="produto_obs"
                                        class="col-md-4 col-form-label text-md-right">Observação</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="produto_obs"
                                            value="{{ old('produto_obs') }}" autocomplete="produto_obs">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Último Preço</label>
                                    <div class="col-md-4">
                                        <input type="decimal" class="form-control" name="produto_preco"
                                            value="{{ old('produto_preco') }}" autocomplete="produto_preco">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">@lang('minhaslistas.closemodal')</button>
                                    <button type="submit" class="btn btn-primary"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

@endsection
