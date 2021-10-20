<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Teko&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon" />
        <script src="https://kit.fontawesome.com/0fdaa0e73d.js" crossorigin="anonymous"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>

    <main>
  <header id="header">
    <a id="logo" href="./index.html">
      <img src="./img/logo_horizontal.gif" alt="Logo"/>
    </a>
    <div id="translation">
      <button id="translationButton" onclick="changeLanguage()"><i class="fas fa-flag"></i> EN</button>
    </div>
    <nav id="nav">
      <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu"
        aria-expanded="false">
        Menu
        <span id="hamburger"></span>
      </button>
      <ul id="menu" role="menu">
      @if (Route::has('login'))
                @auth
                <li><a href="" class="checked">Home</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="link link--elara">Login</a></li>
                    
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="link link--elara">Cadastre-se</a></li>
                    @endif
                @endauth
            </div>
        @endif
        
        
        <!--<li><a href="./cadas_ativ.html" class="link link--elara">Calendário de Atividades</a></li>-->
      </ul>
    </nav>
  </header>

  <body>

    <div id="main">
      <h1>Bem-vindo ao List Daily</h1>
      <h3>A melhor plataforma de lista de compras e organização do Brasil</h3>

      <div id="button-container">
        <a href="{{ route('login') }}"><button>LOGIN</button></a>
        <a href="{{ route('register') }}"><button>CADASTRO</button></a>
      </div>

      <div id="cards-container">
        <div class="card">
          <i class="fas fa-box-open"></i>
          <h2>Controle de Estoque</h2>
          <p>Facilite o controle de estoque local ao utilizar nossa aplicação, 
            que lhe avisa quando algo está acabando e lhe auxilia a montar uma lista de compras.</p>
        </div>
        <div class="card">
          <i class="fas fa-cart-plus"></i>
          <h2>Lista de Compras</h2>
          <p>Monte sua lista de compras de forma dinâmica e fácil! <br>
            Com o List Daily, sua lista é montada automaticamente de acordo com o controle de estoque.
          </p>
        </div>
        <div class="card">
          <i class="fas fa-calendar-check"></i>
          <h2>Gerenciador de Atividades</h2>
          <p>Registre e gerencie suas atividades através de nosso aplicativo, onde você pode registrar o quanto irá consumir de produtos e nossa aplicação desconta do estoque automaticamente!</p>
        </div>
      </div>
    </div>

    <div id="main-1">
      <img src="./img/main.gif" alt="Logo" />

      <div id="info-container">
        <div id="header">
          <h1><i class="far fa-question-circle"></i> Por que usar o List Daily?</h1>
        </div>
        <br>
        <div id="description">
          <p>O List Daily é uma plataforma interativa, na qual você pode controlar o estoque de um local, montar listas de compras de forma dinâmica e gerenciar suas atividades. Sendo assim, o List Daily é seu melhor amigo quando o assunto é organização e controle.</p>
          <br><br><br>
        </div>
      </div>
    </div>

    <!--<br><br><br><br><br><br><br><br><br><br> --> 

    <!--<script src="../js/script.js"></script>-->
  </body>
</main>

    <!--<body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Cadastre-se</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:pt-0">
                        <img src="./img/main.gif" width="180em" height="180em" />
                </div>
                <div class="text-center">
                    <h1>Bem-vindo ao List Daily</h1>
                    <h3>A melhor plataforma de lista de compras e organização do Brasil</h3>
                </div>
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <h2>Lista de Compras</h2>
                                    <p>Monte sua lista de compras de forma dinâmica e fácil! <br>Com o List Daily, sua lista é montada automaticamente de acordo com o controle de estoque.</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <h2>Controle de Estoque</h2>
                                    <p>Facilite o controle de estoque local ao utilizar nossa aplicação, que lhe avisa quando algo está acabando e lhe auxilia a montar uma lista de compras.</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <h2>Gerenciador de Atividades</h2>
                                    <p>Registre e gerencie suas atividades através de nosso aplicativo, onde você pode registrar o quanto irá consumir de produtos e nossa aplicação desconta do estoque automaticamente!</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <h2>Organize sua vida</h2>
                                    <p>Otimize seu tempo e organize sua casa ao mesmo tempo!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    </div>
                </div>
            </div>
        </div>
    </body>-->
</html>
