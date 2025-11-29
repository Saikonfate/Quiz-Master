<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <img src="{{ asset('imgs/Hands Graduate.png') }}" alt="GênioQuiz" class="h-9 w-auto" />
                        <span class="font-semibold text-primary">GênioQuiz</span>
                    </a>
                </div>

                <div class="hidden space-x-1 sm:-my-px sm:ms-8 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-4 py-2 rounded-lg text-sm font-medium text-muted hover:text-primary hover:bg-gray-50 transition {{ request()->routeIs('dashboard') ? '!text-primary !bg-gray-100' : '' }}">
                        {{ __('Quiz') }}
                    </x-nav-link>
                    <x-nav-link :href="route('historico')" :active="request()->routeIs('historico')" class="px-4 py-2 rounded-lg text-sm font-medium text-muted hover:text-primary hover:bg-gray-50 transition {{ request()->routeIs('historico') ? '!text-primary !bg-gray-100' : '' }}">
                        {{ __('Histórico') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg text-muted hover:text-primary hover:bg-gray-50 focus:outline-none transition">
                            <div class="w-8 h-8 rounded-full bg-accent/10 flex items-center justify-center text-accent font-medium">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-sm text-muted hover:text-primary">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="text-sm text-muted hover:text-primary"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-muted hover:text-primary hover:bg-gray-100 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block px-4 py-2 rounded-lg text-sm font-medium text-muted hover:text-primary hover:bg-gray-50">
                {{ __('Quiz') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('historico')" :active="request()->routeIs('historico')" class="block px-4 py-2 rounded-lg text-sm font-medium text-muted hover:text-primary hover:bg-gray-50">
                {{ __('Histórico') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-4 border-t border-gray-100 px-4">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center text-accent font-medium">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-medium text-sm text-primary">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-muted">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="block px-4 py-2 rounded-lg text-sm font-medium text-muted hover:text-primary hover:bg-gray-50">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="block px-4 py-2 rounded-lg text-sm font-medium text-muted hover:text-primary hover:bg-gray-50"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Sair') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
