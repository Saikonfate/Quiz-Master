<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4">
        <div class="w-full max-w-md">
            <div class="text-center mb-10">
                <img src="{{ asset('imgs/Hands Graduate.png') }}" alt="GênioQuiz" class="h-16 w-auto mx-auto mb-4" />
                <h1 class="text-2xl font-semibold text-primary">Entrar no GênioQuiz</h1>
                <p class="text-muted mt-2">Bem-vindo de volta! Faça login para continuar.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-5">
                        <label for="email" class="block text-sm font-medium text-primary mb-2">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-accent focus:ring-2 focus:ring-accent/20 transition outline-none text-primary placeholder:text-gray-400"
                            placeholder="seu@email.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <label for="password" class="block text-sm font-medium text-primary mb-2">Senha</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-accent focus:ring-2 focus:ring-accent/20 transition outline-none text-primary placeholder:text-gray-400"
                            placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-accent focus:ring-accent/20">
                            <span class="ml-2 text-sm text-muted">Lembrar-me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-accent hover:text-accent/80 transition" href="{{ route('password.request') }}">
                                Esqueceu a senha?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="w-full py-3.5 bg-primary text-white font-medium rounded-xl hover:bg-primary/90 transition shadow-lg shadow-primary/25">
                        Entrar
                    </button>
                </form>
            </div>

            <p class="text-center mt-8 text-muted">
                Não tem uma conta? 
                <a href="{{ route('register') }}" class="text-accent font-medium hover:text-accent/80 transition">Criar conta</a>
            </p>
        </div>
    </div>
</x-guest-layout>
