@extends('layouts.app')

@section('content')

<body class="antialiased">

<h1>Minhas Listas</h1>


Aqui estão as suas listas


@foreach ($user->produtos as $produto)
<h3>{{ $produto->pdt_nome }}</h3>
<p>{{ $produto->pdt_marca }}</p>
@endforeach

<a>Criar Lista</a>
</body>

@endsection
