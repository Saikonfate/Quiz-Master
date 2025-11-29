<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GênioQuiz</title>
        <link rel="icon" type="image/png" href="{{ asset('imgs/Hands Graduate.png') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-white text-primary">
        <div class="min-h-screen flex flex-col">
            <header class="w-full px-6 lg:px-20 py-6">
                <div class="max-w-7xl mx-auto flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('imgs/Hands Graduate.png') }}" alt="GênioQuiz" class="h-10 w-auto" />
                        <span class="text-xl font-semibold tracking-tight">GênioQuiz</span>
                    </div>
                    <div class="flex items-center gap-6">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-muted hover:text-primary transition">Painel</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-medium text-muted hover:text-primary transition">Entrar</a>
                                <a href="{{ route('register') }}" class="px-5 py-2.5 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 transition">Criar conta</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </header>

            <main class="flex-grow flex items-center px-6 lg:px-20 py-20">
                <div class="max-w-7xl mx-auto w-full">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <div>
                            <h1 class="text-4xl md:text-6xl font-bold leading-tight tracking-tight text-primary mb-6">
                                Teste seus conhecimentos de forma inteligente
                            </h1>
                            <p class="text-lg text-muted leading-relaxed mb-10 max-w-lg">
                                Uma plataforma simples e elegante para criar, responder quizzes e acompanhar seu progresso.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 bg-primary text-white font-medium rounded-xl hover:bg-primary/90 transition shadow-lg shadow-primary/25">
                                    Começar agora
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex justify-center lg:justify-end">
                            <img src="{{ asset('imgs/g132.png') }}" alt="Ilustração Quiz" class="w-full max-w-md lg:max-w-lg" />
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
