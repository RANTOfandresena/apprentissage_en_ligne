import'../bootstrap';
import { createApp } from 'vue';
<<<<<<< HEAD
// import App from './afiichageCours.vue';
import App from './afiichageCours.vue';
=======
import App from './afiichageCours.vue';
// import App from './corrigerExamen.vue';
>>>>>>> a65f64148997a0378438cf0b7f70e7d672733fc2
document.addEventListener('DOMContentLoaded', function () {
    var id=document.getElementById('cours').dataset.id
    const app = createApp(App, {
        idCours: id
    });
    app.mount('#cours');
})

