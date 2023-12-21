import'../bootstrap';
import { createApp } from 'vue';
import {createRouter,createWebHistory} from 'vue-router'
import App from './appProf.vue'
import exam from './CreationCours.vue'
import cree from './CreationExam.vue'
const routes =[
    {path:'/Interface%20professeur/1-1/Cr%C3%A9ation%20contenu%20de%20cours/',component:cree},
    {path:'/Interface%20professeur/1-1/Cr%C3%A9ation%20contenu%20de%20cours/examen',component:exam},
]
const router =createRouter({
    history:createWebHistory(),
    routes
})
// import App from './CreationExam.js';
document.addEventListener('DOMContentLoaded', function () {
    var id=document.getElementById('cours').dataset.id
    const app = createApp(App, {
        idCours: id
    });
    app.use(router)
    app.mount('#cours');
})