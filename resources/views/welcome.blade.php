<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">


    <title>ListDaily</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        header {
            position: sticky;
            top: 0;
            z-index: 1;
            box-sizing: border-box;
            height: 3rem;
            padding: 1rem;
            padding-left: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            box-shadow: 1px 1px 10px -6px #000000;
        }

        h2 {
            font-family: 'Bebas Neue';
            font-size: 2.3rem;
        }

        h1,
        h3 {
            font-family: 'Josefin Sans';
        }

        p {
            font-family: 'Josefin Sans';
            font-size: 1.1rem;
        }

        body {
            margin: 0
        }

        a {
            font-family: 'Bebas Neue';
            background-color: transparent;
            font-size: 1.1rem;
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background: #383838;
            border-radius: 30px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #575757;
        }

        ::-webkit-scrollbar-track {
            background: #f0f0f0;
            border-radius: 0px;
            box-shadow: inset 0px 0px 0px 0px #f0f0f0;
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f8f9fa;
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        ..meiota {
            justify-content: center;
            display: flex;
            flex-direction: row;
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .hover {
            color: black;
        }

        .hover:hover {
            color: inherit;
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
        }

    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="antialiased">
    <header>
        <div>
            <a href="#" style="color: black;" class="dropdown-toggle ml-1" data-toggle="dropdown">
                {{ Config::get('languages')[App::getLocale()] }}
            </a>
            <div class="dropdown-menu">
                @foreach (Config::get('languages') as $lang => $language)
                    @if ($lang != App::getLocale())
                        <li>
                            <a style="color: black; margin-left: 1rem;"
                                href="{{ route('lang.switch', $lang) }}">@lang('welcome.' . $language)</a>
                        </li>
                    @endif
                @endforeach
            </div>
        </div>
        <div style="position: absolute; left:50%; margin-left:-3rem; top: 0.7rem;">
            <a href="{{ url('/') }}">
                <img src="/img/logo2.png" alt="Logo" width="110px" height="30px" />
            </a>
        </div>
        @if (Route::has('login'))
            @auth
                <button type="button" class="btn btn-outline-danger btn-sm shadow-none" style="width: 8rem;">
                    <a href="{{ url('/home') }}" class="hover"
                        style="color: inherit; text-decoration: none;">@lang('welcome.home')</a>
                </button>
            @else
                <div>
                    <button type="button" class="btn btn-outline-danger btn-sm shadow-none" style="width: 8rem;">
                        <a href="{{ route('login') }}" class="hover"
                            style="color: inherit; text-decoration: none;">@lang('welcome.login')</a>
                    </button>
                    @if (Route::has('register'))
                        <button type="button" class="btn btn-outline-danger btn-sm shadow-none" style="width: 8rem;">
                            <a href="{{ route('register') }}" class="hover"
                                style="color: inherit; text-decoration: none;">@lang('welcome.register')</a>
                        </button>

                    @endif
                </div>
            @endauth
        @endif
    </header>

    <div class="relative flex items-top min-h-screen sm:items-center py-4 sm:pt-0">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:pt-0 mt-1" style="margin-left: 2rem">
                <img src="./img/logo2.png" width="450rem" />
            </div>
            <div class="text-center mt-3">
                <h1 style="color: #141414;">@lang('welcome.welcome_message')</h1>
                <h3 style="color: #141414;">@lang('welcome.welcome_submessage')</h3>
            </div>
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6 shadow rounded" style="background-color: #fc6d79; margin: 1rem;">

                        <div class="ml-3">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <h2 style="color: #141414">@lang('welcome.shoppinglist')</h2>
                                <p style="color: #141414">@lang('welcome.shoppinglist_desc')</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 shadow rounded" style="background-color:#fc6d79; margin: 1rem;">
                        <div class="ml-3">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <h2 style="color: #141414">@lang('welcome.stockcontrol')</h2>
                                <p style="color: #141414">@lang('welcome.stockcontrol_desc')</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 shadow rounded" style="background-color: #fc6d79; margin: 1rem;">
                        <div class="ml-3">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <h2 style="color: #141414">@lang('welcome.activitymanager')</h2>
                                <p style="color: #141414">@lang('welcome.activitymanager_desc')</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 shadow rounded" style="background-color:#fc6d79; margin: 1rem;">
                        <div class="ml-3">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <h2 style="color: #141414">@lang('welcome.organizelife')</h2>
                                <p style="color: #141414">@lang('welcome.organizelife_desc')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
</body>

</html>
