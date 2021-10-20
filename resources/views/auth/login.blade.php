<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Teko&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon" />
    <!--<script src="../js/translation.js"></script>-->
</head>

<main>

    <body>

        <a href="{{ url('/') }}">
            <img src="../img/main.gif" />
        </a>

        <div>
            <h1>Login</h1>
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>As credenciais informadas não coincidem.</strong>
                    </span>
                @enderror
                <br><br>
                <input id="password" type="password" placeholder="Senha" maxlength="100" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>As credenciais informadas não coincidem.</strong>
                    </span>
                @enderror
                <br><br>
                <input style="width: fit-content;" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    {{ __('Permanecer Logado') }}
                </label>
                <br><br>
                
                <a><button type="submit">ENVIAR</button></a>
                <br><br>
                <a href="{{ route('register') }}">Novo Usuário? Clique aqui para cadastrar-se</a>
                <br><br>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif
            </form>
        </div>
    </body>
</main>

</html>


