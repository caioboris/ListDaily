@extends('layouts.app')

<link href="{{ asset('css/style.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="card-body">
        @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
      </div>
                    @endif
                <div id="main-alt">
                    <br>
                    <h1 >Controle de Lista</h1>
                    Veja abaixo a sua lista de compras.
                    <br>
                    Não se preocupe de organizar sua lista, o List Daily já faz isso baseado no seu consumo.

                    <br>

                    <div class="table-wrapper">
                      <h1>Lista de Compras</h1>
                      <table class="fl-table-alt">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Marca</th>
                                <th>Peso/Un</th>
                                <th>Medida</th>
                                <th>Último Preço</th>
                                <th>Ações</th>
                            </tr>
                          </thead>
                          <tbody id="listaprodutos">
                            <tr>
                                <td>Produto</td>
                                <td>Quantidade</td>
                                <td>Marca</td>
                                <td>Peso/Un</td>
                                <td>Medida</td>
                                <td>Último Preço</td>
                                <td>Ações</td>
                            </tr>
                            <tr>
                                <td>Produto</td>
                                <td>Quantidade</td>
                                <td>Marca</td>
                                <td>Peso/Un</td>
                                <td>Medida</td>
                                <td>Último Preço</td>
                                <td>Ações</td>
                            </tr>
                            <tr>
                                <td>Produto</td>
                                <td>Quantidade</td>
                                <td>Marca</td>
                                <td>Peso/Un</td>
                                <td>Medida</td>
                                <td>Último Preço</td>
                                <td>Ações</td>
                            </tr>
                            <tr>
                                <td>Produto</td>
                                <td>Quantidade</td>
                                <td>Marca</td>
                                <td>Peso/Un</td>
                                <td>Medida</td>
                                <td>Último Preço</td>
                                <td>Ações</td>
                            </tr>
                            <tr>
                                <td>Produto</td>
                                <td>Quantidade</td>
                                <td>Marca</td>
                                <td>Peso/Un</td>
                                <td>Medida</td>
                                <td>Último Preço</td>
                                <td>Ações</td>
                            </tr>
                            <tr>
                                <td>Produto</td>
                                <td>Quantidade</td>
                                <td>Marca</td>
                                <td>Peso/Un</td>
                                <td>Medida</td>
                                <td>Último Preço</td>
                                <td>Ações</td>
                            </tr>
                          </tbody>
                      </table>
                      <div>
                        <button id="scanbtn">Escanear</button>
                        <button id="addlista">Adicionar</button>
                      </div>
                    </div>
                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
