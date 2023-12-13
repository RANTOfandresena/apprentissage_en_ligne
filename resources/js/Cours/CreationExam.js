import'../bootstrap';
import { createApp } from 'vue';
import App from './CreationExam.js';
document.addEventListener('DOMContentLoaded', function () {
    var id=document.getElementById('cours').dataset.id
    const app = createApp(App, {
        idCours: id
    });
    app.mount('#cours');
})

