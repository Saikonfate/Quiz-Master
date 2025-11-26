<template>
    <div class="p-6">
        <div v-if="!quizStarted && !quizFinished">
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 text-brand-yellow">Ranking</h3>
                <div class="bg-brand-gray shadow overflow-hidden sm:rounded-md border border-gray-700">
                    <ul role="list" class="divide-y divide-gray-700">
                        <li v-for="(result, index) in ranking" :key="result.id" class="px-4 py-4 sm:px-6 hover:bg-gray-700 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <span class="text-brand-yellow mr-4 font-bold text-xl">#{{ index + 1 }}</span>
                                    <p class="text-sm font-medium text-brand-light truncate">{{ result.user.name }}</p>
                                </div>
                                <div class="flex flex-col items-end">
                                    <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900 text-yellow-200 border border-yellow-700">
                                        {{ result.score }} pts
                                    </p>
                                    <p class="text-xs text-gray-400 mt-1">
                                        {{ formatTime(result.total_time_seconds) }}
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li v-if="ranking.length === 0" class="px-4 py-4 sm:px-6 text-center text-gray-400">
                            Nenhum resultado ainda. Seja o primeiro!
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-center">
                <button @click="startQuiz" class="bg-brand-yellow hover:bg-yellow-400 text-brand-dark font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300 transform hover:scale-105 uppercase tracking-wider">
                    Iniciar Novo Quiz
                </button>
            </div>
        </div>

        <div v-if="quizStarted && !quizFinished" class="max-w-2xl mx-auto">
            <div class="mb-4 flex justify-between items-center">
                <span class="text-sm font-medium text-brand-yellow">Questão {{ currentQuestionIndex + 1 }}/{{ questions.length }}</span>
                <span class="text-sm font-medium text-gray-400">Tempo: {{ formatTime(elapsedTime) }}</span>
            </div>

            <div class="bg-brand-gray shadow-lg sm:rounded-lg p-6 mb-6 border border-gray-700">
                <h2 class="text-xl font-bold text-brand-light mb-6">{{ currentQuestion.statement }}</h2>

                <div class="space-y-4">
                    <div v-for="option in currentQuestion.options" :key="option.id" 
                        @click="selectOption(option.id)"
                        :class="['p-4 border rounded-lg cursor-pointer transition-all duration-200', 
                            selectedOptionId === option.id ? 'border-brand-yellow bg-yellow-900/20 text-brand-yellow' : 'border-gray-600 hover:bg-gray-700 text-gray-300']">
                        {{ option.text }}
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button @click="confirmAnswer" :disabled="!selectedOptionId" 
                    :class="['font-bold py-2 px-6 rounded transition duration-300 uppercase tracking-wide', 
                        selectedOptionId ? 'bg-brand-yellow hover:bg-yellow-400 text-brand-dark' : 'bg-gray-700 text-gray-500 cursor-not-allowed']">
                    {{ isLastQuestion ? 'Finalizar Quiz' : 'Próxima Pergunta' }}
                </button>
            </div>
        </div>

        <div v-if="quizFinished" class="text-center max-w-lg mx-auto">
            <div class="bg-brand-gray shadow-lg sm:rounded-lg p-8 border border-gray-700">
                <h2 class="text-2xl font-bold text-brand-yellow mb-6">Resultado do Quiz</h2>
                
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-green-900/30 border border-green-800 p-4 rounded-lg">
                        <p class="text-sm text-green-400 font-bold uppercase">Acertos</p>
                        <p class="text-3xl font-bold text-green-400">{{ result.correct_count }}</p>
                    </div>
                    <div class="bg-red-900/30 border border-red-800 p-4 rounded-lg">
                        <p class="text-sm text-red-400 font-bold uppercase">Erros</p>
                        <p class="text-3xl font-bold text-red-400">{{ result.error_count }}</p>
                    </div>
                </div>

                <div class="mb-8">
                    <p class="text-gray-400 uppercase text-sm tracking-wider">Pontuação Final</p>
                    <p class="text-5xl font-bold text-brand-yellow mt-2">{{ result.score }}</p>
                </div>

                <div class="mb-10">
                    <p class="text-gray-400 uppercase text-sm tracking-wider">Tempo Total</p>
                    <p class="text-xl font-bold text-brand-light mt-1">{{ formatTime(result.total_time_seconds) }}</p>
                </div>

                <button @click="resetQuiz" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded transition duration-300 w-full uppercase tracking-widest">
                    Voltar ao Início
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue';
import axios from 'axios';

const ranking = ref([]);
const questions = ref([]);
const currentQuestionIndex = ref(0);
const selectedOptionId = ref(null);
const answers = ref([]);
const quizStarted = ref(false);
const quizFinished = ref(false);
const result = ref(null);
const startTime = ref(null);
const elapsedTime = ref(0);
let timerInterval = null;

const currentQuestion = computed(() => questions.value[currentQuestionIndex.value]);
const isLastQuestion = computed(() => currentQuestionIndex.value === questions.value.length - 1);

const fetchRanking = async () => {
    try {
        const response = await axios.get('/api/quiz/ranking');
        ranking.value = response.data;
    } catch (error) {
        console.error('Error fetching ranking:', error);
    }
};

const startQuiz = async () => {
    try {
        const response = await axios.get('/api/quiz/start');
        questions.value = response.data;
        currentQuestionIndex.value = 0;
        answers.value = [];
        selectedOptionId.value = null;
        quizStarted.value = true;
        quizFinished.value = false;
        startTime.value = Date.now();
        elapsedTime.value = 0;
        
        timerInterval = setInterval(() => {
            elapsedTime.value = Math.floor((Date.now() - startTime.value) / 1000);
        }, 1000);
    } catch (error) {
        console.error('Error starting quiz:', error);
    }
};

const selectOption = (id) => {
    selectedOptionId.value = id;
};

const confirmAnswer = async () => {
    if (!selectedOptionId.value) return;

    answers.value.push({
        question_id: currentQuestion.value.id,
        option_id: selectedOptionId.value
    });

    if (isLastQuestion.value) {
        await submitQuiz();
    } else {
        currentQuestionIndex.value++;
        selectedOptionId.value = null;
    }
};

const submitQuiz = async () => {
    clearInterval(timerInterval);
    const totalTime = Math.floor((Date.now() - startTime.value) / 1000);

    try {
        const response = await axios.post('/api/quiz/submit', {
            answers: answers.value,
            total_time_seconds: totalTime
        });
        result.value = response.data;
        quizFinished.value = true;
    } catch (error) {
        console.error('Error submitting quiz:', error);
    }
};

const resetQuiz = () => {
    quizStarted.value = false;
    quizFinished.value = false;
    fetchRanking();
};

const formatTime = (seconds) => {
    const m = Math.floor(seconds / 60);
    const s = seconds % 60;
    return `${m}:${s.toString().padStart(2, '0')}`;
};

onMounted(() => {
    fetchRanking();
});

onUnmounted(() => {
    if (timerInterval) clearInterval(timerInterval);
});
</script>
