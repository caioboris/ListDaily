@extends('layouts.app')

@section('content')

    <body class="antialiased">
        <div class="text-center">
            <h1>{{ $data->lista_nome }}</h1>
            <p>{{ $data->lista_desc }}</p>
        </div>

        <table class="table table-striped" style="width: 90%; margin: auto">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Último Preço</th>
                </tr>
            </thead>
            @foreach ($produtos as $key => $data)
                <tr>
                    <td scope="row"></td>
                    <td>{{ $data->produto_nome }}</td>
                    <td>{{ $data->produto_obs }}</td>
                    <td>R${{ $data->produto_preco }}</td>
                </tr>
            @endforeach
            <tbody>

            </tbody>
        </table>
    </body>

@endsection
