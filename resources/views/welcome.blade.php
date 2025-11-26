<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-brand-darker text-brand-light min-h-screen flex flex-col justify-center items-center relative overflow-hidden">
        
        <!-- Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-brand-yellow/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-brand-yellow/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto p-6 lg:p-8 text-center">
            <div class="flex justify-center mb-8">
                <x-application-logo class="w-24 h-24 fill-current text-brand-yellow" />
            </div>

            <h1 class="text-5xl font-bold text-brand-yellow mb-4 tracking-tight">
                Quiz Master
            </h1>
            
            <p class="text-xl text-gray-400 mb-12 max-w-2xl mx-auto">
                Teste seus conhecimentos, desafie seus limites e conquiste o topo do ranking.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-8 py-4 bg-brand-yellow text-brand-dark font-bold rounded-lg hover:bg-yellow-400 transition duration-300 transform hover:scale-105 shadow-lg uppercase tracking-wider">
                            Ir para o Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-8 py-4 bg-brand-yellow text-brand-dark font-bold rounded-lg hover:bg-yellow-400 transition duration-300 transform hover:scale-105 shadow-lg uppercase tracking-wider">
                            Entrar
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-8 py-4 bg-transparent border-2 border-brand-yellow text-brand-yellow font-bold rounded-lg hover:bg-brand-yellow hover:text-brand-dark transition duration-300 transform hover:scale-105 uppercase tracking-wider">
                                Registrar-se
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>

    </body>
</html>
