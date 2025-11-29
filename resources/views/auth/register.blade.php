<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4">
        <div class="w-full max-w-md">
            <div class="text-center mb-10">
                <img src="{{ asset('imgs/Hands Graduate.png') }}" alt="GênioQuiz" class="h-16 w-auto mx-auto mb-4" />
                <h1 class="text-2xl font-semibold text-primary">Criar conta</h1>
                <p class="text-muted mt-2">Preencha os dados para começar.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-5">
                        <label for="name" class="block text-sm font-medium text-primary mb-2">Nome</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-accent focus:ring-2 focus:ring-accent/20 transition outline-none text-primary placeholder:text-gray-400"
                            placeholder="Seu nome completo" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <label for="email" class="block text-sm font-medium text-primary mb-2">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-accent focus:ring-2 focus:ring-accent/20 transition outline-none text-primary placeholder:text-gray-400"
                            placeholder="seu@email.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <label for="password" class="block text-sm font-medium text-primary mb-2">Senha</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-accent focus:ring-2 focus:ring-accent/20 transition outline-none text-primary placeholder:text-gray-400"
                            placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-primary mb-2">Confirmar Senha</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-accent focus:ring-2 focus:ring-accent/20 transition outline-none text-primary placeholder:text-gray-400"
                            placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <button type="submit" class="w-full py-3.5 bg-primary text-white font-medium rounded-xl hover:bg-primary/90 transition shadow-lg shadow-primary/25">
                        Criar conta
                    </button>
                </form>
            </div>

            <p class="text-center mt-8 text-muted">
                Já tem uma conta? 
                <a href="{{ route('login') }}" class="text-accent font-medium hover:text-accent/80 transition">Entrar</a>
            </p>
        </div>
    </div>
</x-guest-layout>
