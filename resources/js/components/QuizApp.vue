<template>
    <div>
        <div v-if="!quizStarted && !quizFinished" class="max-w-2xl mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-semibold text-primary mb-3">Escolha seus temas</h1>
                <p class="text-muted">Selecione os tópicos que deseja estudar</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
                <div class="flex flex-wrap justify-center gap-3 mb-10">
                    <button v-for="topic in topics" :key="topic.id" 
                        @click="toggleTopic(topic.id)"
                        :class="['px-5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200', 
                            selectedTopics.includes(topic.id) 
                                ? 'bg-accent text-white shadow-lg shadow-accent/25' 
                                : 'bg-gray-100 text-muted hover:bg-gray-200']">
                        {{ topic.name }}
                    </button>
                </div>

                <div class="text-center">
                    <button @click="startQuiz" class="inline-flex items-center px-8 py-4 bg-primary text-white font-medium rounded-xl hover:bg-primary/90 transition shadow-lg shadow-primary/25">
                        Iniciar Quiz
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div v-if="quizStarted && !quizFinished" class="max-w-3xl mx-auto">
            <div class="mb-8">
                <div class="flex justify-between items-center mb-3">
                    <span class="text-sm font-medium text-muted">Questão {{ currentQuestionIndex + 1 }} de {{ questions.length }}</span>
                    <span class="text-sm font-medium text-muted flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ formatTime(elapsedTime) }}
                    </span>
                </div>
                <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                    <div class="h-full bg-accent transition-all duration-300 rounded-full" 
                        :style="{ width: ((currentQuestionIndex + 1) / questions.length * 100) + '%' }"></div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-6">
                <div class="p-8 border-b border-gray-100">
                    <h2 class="text-xl font-semibold text-primary leading-relaxed">
                        {{ currentQuestion.statement }}
                    </h2>
                </div>

                <div class="p-6">
                    <div class="space-y-3">
                        <button v-for="option in currentQuestion.options" :key="option.id" 
                            @click="!answerChecked && selectOption(option.id)"
                            :disabled="answerChecked"
                            :class="['w-full p-5 rounded-xl text-left transition-all duration-200 flex items-center gap-4 border-2', 
                                getOptionClass(option.id)]">
                            <div :class="['w-6 h-6 rounded-full border-2 flex items-center justify-center flex-shrink-0 transition-colors',
                                getRadioClass(option.id)]">
                                <div v-if="selectedOptionId === option.id || (answerChecked && option.id === correctOptionId)" 
                                    class="w-3 h-3 rounded-full bg-current"></div>
                            </div>
                            <span class="font-medium">{{ option.text }}</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button v-if="!answerChecked" @click="confirmAnswer" :disabled="!selectedOptionId" 
                    :class="['px-8 py-3.5 rounded-xl font-medium transition flex items-center gap-2', 
                        selectedOptionId 
                            ? 'bg-primary text-white hover:bg-primary/90 shadow-lg shadow-primary/25' 
                            : 'bg-gray-200 text-gray-400 cursor-not-allowed']">
                    Confirmar
                </button>
                <button v-else @click="nextQuestion" 
                    class="px-8 py-3.5 bg-primary text-white font-medium rounded-xl hover:bg-primary/90 transition shadow-lg shadow-primary/25 flex items-center gap-2">
                    {{ isLastQuestion ? 'Ver Resultado' : 'Próxima' }}
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>
            </div>
        </div>

        <div v-if="quizFinished" class="max-w-md mx-auto text-center py-12">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-10">
                <div class="w-20 h-20 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <h2 class="text-2xl font-semibold text-primary mb-2">Quiz Finalizado!</h2>
                <p class="text-muted mb-8">Confira seu desempenho</p>

                <div class="text-6xl font-bold text-accent mb-2">{{ result.score }}</div>
                <p class="text-muted mb-8">pontos</p>

                <div class="grid grid-cols-2 gap-4 mb-10">
                    <div class="bg-green-50 rounded-xl p-4">
                        <div class="text-2xl font-bold text-green-600">{{ result.correct_count }}</div>
                        <div class="text-sm text-green-600">Acertos</div>
                    </div>
                    <div class="bg-red-50 rounded-xl p-4">
                        <div class="text-2xl font-bold text-red-500">{{ result.error_count }}</div>
                        <div class="text-sm text-red-500">Erros</div>
                    </div>
                </div>

                <button @click="resetQuiz" class="w-full py-4 bg-primary text-white font-medium rounded-xl hover:bg-primary/90 transition shadow-lg shadow-primary/25">
                    Jogar Novamente
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue';
import axios from 'axios';

const questions = ref([]);
const currentQuestionIndex = ref(0);
const selectedOptionId = ref(null);
const answers = ref([]);
const quizStarted = ref(false);
const quizFinished = ref(false);
const result = ref(null);
const startTime = ref(null);
const elapsedTime = ref(0);
const answerChecked = ref(false);
const correctOptionId = ref(null);
let timerInterval = null;

const topics = ref([
    { id: 'games', name: 'Games' },
    { id: 'cinema', name: 'Cinema' },
    { id: 'historia', name: 'História' },
]);
const selectedTopics = ref([]);

const currentQuestion = computed(() => questions.value[currentQuestionIndex.value]);
const isLastQuestion = computed(() => currentQuestionIndex.value === questions.value.length - 1);

const toggleTopic = (id) => {
    if (selectedTopics.value.includes(id)) {
        selectedTopics.value = selectedTopics.value.filter(t => t !== id);
    } else {
        selectedTopics.value.push(id);
    }
};

const startQuiz = async () => {
    try {
        const response = await axios.get('/api/quiz/start', {
            params: {
                categories: selectedTopics.value
            }
        });
        questions.value = response.data;
        currentQuestionIndex.value = 0;
        answers.value = [];
        selectedOptionId.value = null;
        answerChecked.value = false;
        correctOptionId.value = null;
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
    if (!answerChecked.value) {
        selectedOptionId.value = id;
    }
};

const getOptionClass = (optionId) => {
    if (answerChecked.value) {
        if (optionId === correctOptionId.value) {
            return 'border-green-500 bg-green-50';
        }
        if (optionId === selectedOptionId.value && optionId !== correctOptionId.value) {
            return 'border-red-500 bg-red-50';
        }
        return 'border-gray-200 bg-gray-50 opacity-50';
    }
    
    return selectedOptionId.value === optionId 
        ? 'border-accent bg-accent/5' 
        : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50';
};

const getRadioClass = (optionId) => {
    if (answerChecked.value) {
        if (optionId === correctOptionId.value) {
            return 'border-green-500 text-green-500';
        }
        if (optionId === selectedOptionId.value && optionId !== correctOptionId.value) {
            return 'border-red-500 text-red-500';
        }
        return 'border-gray-300';
    }
    
    return selectedOptionId.value === optionId 
        ? 'border-accent text-accent' 
        : 'border-gray-300';
};

const confirmAnswer = async () => {
    if (!selectedOptionId.value || answerChecked.value) return;

    try {
        const response = await axios.post('/api/quiz/check-answer', {
            question_id: currentQuestion.value.id,
            option_id: selectedOptionId.value
        });

        correctOptionId.value = response.data.correct_option_id;
        answerChecked.value = true;

        answers.value.push({
            question_id: currentQuestion.value.id,
            option_id: selectedOptionId.value
        });
    } catch (error) {
        console.error('Error checking answer:', error);
    }
};

const nextQuestion = async () => {
    if (isLastQuestion.value) {
        await submitQuiz();
    } else {
        currentQuestionIndex.value++;
        selectedOptionId.value = null;
        answerChecked.value = false;
        correctOptionId.value = null;
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
};

const formatTime = (seconds) => {
    const m = Math.floor(seconds / 60);
    const s = seconds % 60;
    return `${m}:${s.toString().padStart(2, '0')}`;
};

onUnmounted(() => {
    if (timerInterval) clearInterval(timerInterval);
});
</script>
