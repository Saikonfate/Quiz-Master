import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';

window.Alpine = Alpine;

Alpine.start();

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import QuizApp from './components/QuizApp.vue';
import Ranking from './components/Ranking.vue';
import History from './components/History.vue';

app.component('example-component', ExampleComponent);
app.component('quiz-app', QuizApp);
app.component('ranking-component', Ranking);
app.component('history-component', History);

if (document.getElementById('app')) {
    app.mount('#app');
}
