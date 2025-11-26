import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';

window.Alpine = Alpine;

Alpine.start();

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import QuizApp from './components/QuizApp.vue';

app.component('example-component', ExampleComponent);
app.component('quiz-app', QuizApp);

if (document.getElementById('app')) {
    app.mount('#app');
}
