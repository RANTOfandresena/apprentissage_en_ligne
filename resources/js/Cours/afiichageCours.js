import'../bootstrap';
import { createApp } from 'vue';
// import App from './afiichageCours.vue';
// import App from './afiichageCours.vue';
import App from './afiichageCours.vue';
// import App from './corrigerExamen.vue';
document.addEventListener('DOMContentLoaded', function () {
    var id=document.getElementById('cours').dataset.id
    const app = createApp(App, {
        idCours: id
    });
    app.mount('#cours');
})

