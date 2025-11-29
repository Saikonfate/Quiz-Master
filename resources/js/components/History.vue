<template>
    <div class="min-h-[calc(100vh-4rem)] py-8 px-4">
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-semibold text-primary mb-3">Meu Histórico</h1>
                <p class="text-muted">Veja seus resultados anteriores</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <ul class="divide-y divide-gray-100">
                    <li v-for="(result, index) in history" :key="result.id" 
                        class="px-6 py-5 hover:bg-gray-50 transition">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center">
                                    <span class="text-accent font-bold text-lg">{{ result.score }}</span>
                                </div>
                                
                                <div>
                                    <p class="font-medium text-primary">
                                        {{ result.correct_count }} acertos, {{ result.error_count }} erros
                                    </p>
                                    <p class="text-xs text-muted">{{ formatDate(result.created_at) }}</p>
                                </div>
                            </div>
                            
                            <div class="text-right">
                                <p class="text-sm font-medium text-muted flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ formatTime(result.total_time_seconds) }}
                                </p>
                            </div>
                        </div>
                    </li>
                    <li v-if="history.length === 0" class="px-6 py-12 text-center text-muted">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p>Nenhum quiz realizado ainda.</p>
                        <p class="text-sm">Comece a jogar para ver seu histórico!</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const history = ref([]);

const fetchHistory = async () => {
    try {
        const response = await axios.get('/api/quiz/history');
        history.value = response.data;
    } catch (error) {
        console.error('Error fetching history:', error);
    }
};

const formatTime = (seconds) => {
    const m = Math.floor(seconds / 60);
    const s = seconds % 60;
    return `${m}:${s.toString().padStart(2, '0')}`;
};

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('pt-BR', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
};

onMounted(() => {
    fetchHistory();
});
</script>
