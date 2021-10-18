<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Teko&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon" />
    <!--<script src="./scripts/translation.js"></script>-->
</head>

<main>

    <body>
        <a href="{{ url('/') }}">
            <img src="../img/main.gif" />
        </a>

        <div>
            <h1>Cadastro</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br><br>
                <input id="password" type="password" placeholder="Senha" maxlength="100" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <p style="color: rgb(82, 82, 82);">obs: Maxímo de 100 caracteres!</p>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme a Senha" maxlength="100">
                <p style="color: rgb(82, 82, 82);">obs: Maxímo de 100 caracteres!</p>
                <a><button type="submit">ENVIAR</button></a>
                <br><br>
                <a href="{{ route('login') }}">Já Possui cadastro? Clique aqui para efetuar o login</a>
            </form>
        </div>
    </body>
</main>