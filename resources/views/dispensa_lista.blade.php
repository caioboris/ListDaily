@extends('layouts.app')

@section('content')

<div class="container">
    <div class="text-center">
        <h2>Sua Dispensa</h2>
    </div>
    <div class="col">
        <table class="table">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Nome do Produto</th>
                <th scope="col">Marca</th>
                <th scope="col">Peso/Volume</th>
                <th scope="col">Medida</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($user->produtos as $produto)
            <tr>
                <th scope="row">{{$produto->pdt_quantidade}} </th>
                <td>{{$produto->pdt_nome}}</td>
                <td>{{$produto->pdt_marca}}</td>
                <td>{{$produto->pdt_peso}}</td>
                <td>{{$produto->pdt_medida}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
</div>

