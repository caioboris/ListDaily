@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        function setProdutoID(id) {
            document.getElementById('currentProduto').value = id;
        }
    </script>
    <script>
        function eventFire(el, etype) {
            if (el.fireEvent) {
                el.fireEvent('on' + etype);
            } else {
                var evObj = document.createEvent('Events');
                evObj.initEvent(etype, true, false);
                el.dispatchEvent(evObj);
            }
        }
    </script>
    <script src="../js/quagga.min.js"></script>
    <script>
        function initQuagga() {
            Quagga.init({
                    inputStream: {
                        name: "Live",
                        type: "LiveStream",
                        target: document.querySelector("#scanbarcode"), // Or '#yourElement' (optional)
                    },
                    decoder: {
                        readers: ["ean_reader"],
                    },
                },
                function(err) {
                    if (err) {
                        console.log(err);
                        return;
                    }
                    console.log("Initialization finished. Ready to start");
                    Quagga.start();
                }
            );

            Quagga.onDetected(function(data) {
                console.log(data);
                console.log(document.getElementById("barcode_input"));
                let hiddenInput = document.getElementById("barcode_input");
                console.log(hiddenInput);
                hiddenInput.value = data.codeResult.code;
                let form = document.getElementById("barcodeForm");
                form.submit();
                Quagga.stop();

                //post("./codigos.php", data.codeResult.code);
            });
        }
    </script>

    <body class="antialiased">

        <div class="text-center">
            <h1>{{ $data->lista_nome }}</h1>
            <p>{{ $data->lista_desc }}</p>
        </div>

        <div style="display: flex; justify-content: center; align-items: center; margin: 1rem 0">
            <button type="button" id="addprodutos" class="btn btn-outline-danger btn-sm" style="width:10rem; margin: 1rem;"
                data-toggle="modal" data-target="#updateListaModal">
                @lang('lista.addproducts')
            </button>
            <button type="button" class="btn btn-outline-danger btn-sm" style="width:10rem; margin: 1rem;"
                data-toggle="modal" data-target="#compartilharListaModal">
                @lang('lista.sharelist')
            </button>
            <button type="button" class="btn btn-outline-danger btn-sm" style="width:10rem; margin: 1rem;"
                data-toggle="modal" data-target="#removerUsuarioListaModal">
                @lang('lista.removeuser')
            </button>
        </div>

        <div class="table-responsive shadow"
            style="max-height:30rem;width: 90%;margin: auto; border: 2px solid #383838;height: 30rem;
                                                                                                                                                                border-radius: 5px;">
            <table class="table table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">@lang('lista.nameproducts')</th>
                        <th scope="col">@lang('lista.nameobs')</th>
                        <th scope="col">@lang('lista.price')</th>
                        <th scope="col">@lang('lista.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $key => $value)
                        <tr>
                            <td scope="row"></td>
                            <td>{{ $value->produto_nome }}</td>
                            <td>{{ $value->produto_obs }}</td>
                            @if ($value->produto_preco)
                                <td>R${{ $value->produto_preco }}</td>
                            @else
                                <td scope="row"></td>
                            @endif

                            <td style="display: flex; height: 100%;">
                                <form method="POST" action="{{ route('produto.remover') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_produto" value={{ $value->id }}>
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        style="width:2rem;">⤫</button>
                                </form>
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                    style="width:2rem; margin-left: 1rem" onclick="setProdutoID({{ $value->id }})"
                                    data-toggle="modal" data-target="#updateProdutoModal">✎</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal">
                <a style="text-decoration: none; color: inherit;" href="{{ route('home') }}">@lang('lista.home')</a>
            </button>
        </div>

        <div class="modal fade" id="updateListaModal" tabindex="-1" aria-labelledby="updateListaModalLabel"
            aria-hidden="true" aria-modal="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateListaModal">@lang('lista.addproducts')</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">
                            <form method="POST" action="{{ route('lista.editar') }}">
                                {{ csrf_field() }}
                                <input type="hidden" id="currentLista" name="id_lista" value={{ $data->id }}>
                                <input type="hidden" id="currentCodigo" name="codigo_de_barras">
                                <div class="form-group row">
                                    <label for="produto_nome"
                                        class="col-md-4 col-form-label text-md-right">@lang('lista.nameproducts')</label>

                                    <div class="col-md-6">
                                        <input type="text" id="nomeproduto" class="form-control" name="produto_nome"
                                            value="{{ old('produto_nome') }}" required autocomplete="produto_nome"
                                            autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="produto_obs"
                                        class="col-md-4 col-form-label text-md-right">@lang('lista.nameobs')</label>
                                    <div class="col-md-6">
                                        <input type="text" id="obs" class="form-control" name="produto_obs"
                                            value="{{ old('produto_obs') }}" autocomplete="produto_obs">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">@lang('lista.price')</label>
                                    <div class="col-md-4">
                                        <input type="number" min="0.00" step="0.01" id="preco" class="form-control"
                                            name="produto_preco" value="{{ old('produto_preco') }}"
                                            autocomplete="produto_preco">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">@lang('minhaslistas.closemodal')</button>
                                    <button type="submit" class="btn btn-primary">@lang('minhaslistas.addmodal')</button>
                                    <button id="scanbtn" type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#escanearProdutoModal"
                                        onclick="initQuagga()">@lang('lista.scan')</button>
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
                        <h5 class="modal-title" id="updateProdutoModal">@lang('lista.edit')</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">
                            <form method="POST" action="{{ route('produto.editar') }}">
                                {{ csrf_field() }}
                                <input type="hidden" id="currentProduto" name="id_produto">
                                <div class="form-group row">
                                    <label for="produto_nome"
                                        class="col-md-4 col-form-label text-md-right">@lang('lista.nameproducts')</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="produto_nome"
                                            value="{{ old('produto_nome') }}" autocomplete="produto_nome" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="produto_obs"
                                        class="col-md-4 col-form-label text-md-right">@lang('lista.nameobs')</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="produto_obs"
                                            value="{{ old('produto_obs') }}" autocomplete="produto_obs">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">@lang('lista.price')</label>
                                    <div class="col-md-4">
                                        <input type="decimal" class="form-control" name="produto_preco"
                                            value="{{ old('produto_preco') }}" autocomplete="produto_preco">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">@lang('minhaslistas.closemodal')</button>
                                    <button type="submit" class="btn btn-primary">@lang('lista.editbtn')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="escanearProdutoModal" tabindex="-2" aria-labelledby="escanearProdutoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="escanearProdutoModal">@lang('lista.scanproduct')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">
                            <form method="POST" id="barcodeForm" action="{{ route('verificar') }}">
                                {{ csrf_field() }}
                                <input type="hidden" id="barcode_input" name="barcode">
                                <div id="scanbarcode">
                                    <video src="" style="width: 100%; height: auto;"></video>
                                    <canvas class="drawingBuffer" style="display: none;"></canvas>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="compartilharListaModal" tabindex="-1" aria-labelledby="compartilharListaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="compartilharListaModal">@lang('lista.sharelist')</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">
                            <form method="POST" action="{{ route('lista.compartilhar') }}">
                                {{ csrf_field() }}
                                <input type="hidden" id="currentLista" name="id_lista" value={{ $data->id }}>
                                <div class="form-group row">
                                    <label for="usuario_email"
                                        class="col-md-4 col-form-label text-md-right">@lang('lista.email')</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="usuario_email"
                                            value="{{ old('usuario_email') }}" autocomplete="usuario_email" required
                                            autofocus>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">@lang('minhaslistas.closemodal')</button>
                                    <button type="submit" class="btn btn-primary">@lang('lista.share')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="removerUsuarioListaModal" tabindex="-1"
            aria-labelledby="removerUsuarioListaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="removerUsuarioListaModal">@lang('lista.removeuser')</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">
                            <form method="POST" action="{{ route('lista.removerUsuario') }}">
                                {{ csrf_field() }}
                                <input type="hidden" id="currentLista" name="id_lista" value={{ $data->id }}>
                                <div class="form-group row">
                                    <label for="usuario_id"
                                        class="col-md-4 col-form-label text-md-right">@lang('lista.user')</label>

                                    <div class="col-md-6">
                                        <select class="form-select form-select-sm" name="usuario_id"
                                            aria-label=".form-select-sm example">
                                            <option selected>@lang('lista.select')</option>
                                            @foreach ($compartilhados as $key => $usuario)
                                                @if ($usuario->id != \Auth::user()->id)
                                                    <option value={{ $usuario->id }}>{{ $usuario->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">@lang('minhaslistas.closemodal')</button>
                                    <button type="submit" class="btn btn-primary">@lang('lista.removebtn')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (session()->has('codigo')) {
            echo '<script>';
            echo "$('#updateListaModal').modal('show');";
            echo "var barcodeinput = document.getElementById('currentCodigo');";
            echo 'barcodeinput.value = ' . session()->get('codigo') . ';';
            echo '</script>';
            session()->forget('codigo');
            if (session()->has('produto')) {
                $produto = session()->get('produto');
                echo '<script>';
                echo "var nomeproduto = document.getElementById('nomeproduto');";
                echo "nomeproduto.value = '" . $produto->produto_nome . "';";
                echo "var obs = document.getElementById('obs');";
                echo "obs.value = '" . $produto->produto_obs . "';";
                echo "var preco = document.getElementById('preco');";
                echo "preco.value = '" . $produto->produto_preco . "';";
                echo '</script>';
                session()->forget('produto');
            }
        }
        
        ?>
    </body>

@endsection
