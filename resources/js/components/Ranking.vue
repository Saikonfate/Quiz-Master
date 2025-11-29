<template>
    <div>
        <div class="bg-gradient-to-br from-primary to-accent rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-white/95 backdrop-blur m-1 rounded-xl overflow-hidden">
                <ul class="divide-y divide-gray-100">
                    <li v-for="(result, index) in ranking" :key="result.id" 
                        :class="['px-6 py-4 flex items-center justify-between transition',
                            index === 0 ? 'bg-gradient-to-r from-yellow-50 to-amber-50' :
                            index === 1 ? 'bg-gradient-to-r from-gray-50 to-slate-50' :
                            index === 2 ? 'bg-gradient-to-r from-orange-50 to-amber-50' :
                            'hover:bg-gray-50']">
                        <div class="flex items-center gap-4">
                            <div class="flex-shrink-0 w-10 text-center">
                                <span v-if="index === 0" class="text-3xl">🥇</span>
                                <span v-else-if="index === 1" class="text-2xl">🥈</span>
                                <span v-else-if="index === 2" class="text-2xl">🥉</span>
                                <span v-else class="text-lg font-bold text-muted">{{ index + 1 }}</span>
                            </div>
                            
                            <div :class="['w-11 h-11 rounded-full flex items-center justify-center font-semibold text-sm',
                                index === 0 ? 'bg-yellow-400 text-white shadow-lg shadow-yellow-400/30' :
                                index === 1 ? 'bg-gray-400 text-white shadow-lg shadow-gray-400/30' :
                                index === 2 ? 'bg-orange-400 text-white shadow-lg shadow-orange-400/30' :
                                'bg-accent/10 text-accent']">
                                {{ result.user.name.charAt(0) }}
                            </div>
                            
                            <div>
                                <p :class="['font-semibold', index < 3 ? 'text-primary text-base' : 'text-primary text-sm']">
                                    {{ result.user.name }}
                                </p>
                                <p class="text-xs text-muted flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ formatTime(result.total_time_seconds) }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="text-right">
                            <p :class="['font-bold', index < 3 ? 'text-xl text-accent' : 'text-lg text-primary']">
                                {{ result.score }}
                            </p>
                            <p class="text-xs text-muted">pontos</p>
                        </div>
                    </li>
                    <li v-if="ranking.length === 0" class="px-6 py-12 text-center text-muted">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <p class="font-medium">Nenhum resultado ainda.</p>
                        <p class="text-sm">Seja o primeiro a jogar!</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const ranking = ref([]);

const fetchRanking = async () => {
    try {
        const response = await axios.get('/api/quiz/ranking');
        ranking.value = response.data;
    } catch (error) {
        console.error('Error fetching ranking:', error);
    }
};

const formatTime = (seconds) => {
    const m = Math.floor(seconds / 60);
    const s = seconds % 60;
    return `${m}:${s.toString().padStart(2, '0')}`;
};

onMounted(() => {
    fetchRanking();
});
</script>