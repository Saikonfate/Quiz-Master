<x-app-layout>
    <div class="min-h-[calc(100vh-4rem)] py-8 px-4">
        <div class="max-w-4xl mx-auto">
            <quiz-app></quiz-app>
            
            <div class="mt-8">
                <div class="text-center mb-4">
                    <h2 class="text-xl font-semibold text-primary mb-1">🏆 Ranking</h2>
                    <p class="text-muted text-sm">Os melhores jogadores</p>
                </div>
                <ranking-component></ranking-component>
            </div>
        </div>
    </div>
</x-app-layout>
