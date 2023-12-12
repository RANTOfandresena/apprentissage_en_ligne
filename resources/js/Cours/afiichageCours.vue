<template>
    <section style="height: 100vh;text-align: center;">
    
        <div style="width: 20vw;">
            <p style="color: white;" @click="commentaires">chapitre</p><br>
            <div class="chapitree" v-for="chp in chapitres" :key="chp"
                :class="chapitre===chp ? 'chp':''"
                >
                <div v-if="chapitre===chp " class="radius haut"><div></div></div>
                <h3
                    :style="chapitre===chp? 'color:#000047':'color: white;'"
                    @click="chapitre=chp;partie=0;"
                >{{chp.nom}}</h3>
                <div v-if="chapitre===chp " class="radius bas"><div></div></div>
            </div>
        </div>
        <div class="contenue" style="width: 80%;">
            <div v-if="numchapitre!==null">
                <div class="contenuee"  v-for="contenue in numchapitre.partie[numPartie].cours" :key="contenue">
                    <i class="fa fa-comment-o icon" style="font-size:24px"></i>
                    <!-- si paragraphe -->
                    <p v-if="contenue.type==='paragraphe'">{{ contenue.text }}</p>
                    <!-- si titre -->
                    <h1 v-if="contenue.type==='titre'">{{ contenue.text }}</h1>
                    <!-- si question -->
                    <p v-if="contenue.type==='input'">{{ contenue.text }}</p>
                    <div v-if="contenue.type==='image'">
                        <img :src="contenue.text" alt=":)">
                    </div>
                    <input v-if="contenue.type==='input'" type="text"><button v-if="contenue.type=='input'">Envoyer</button>
                </div>
            </div>
            <div class="page" v-if="numchapitre!==null">
                <div class="pagination">
                    <a >&laquo;</a>
                    <a
                        :class="partie==i-1?'active':''"
                        @click="partie=i-1"
                        v-for="i in numchapitre.partie.length" :key="i"
                    >{{i}}</a>
                    <a >&raquo;</a>
                </div>
            </div>
        </div>
        
        <!--  -->
        <transition name="affiche">
            <div class="sidenav" v-if="active" ><a>&times;</a>
                <div style="height: 100%;overflow-y: scroll;">
                    <div v-for="coms in commentaire">
                        <div :class="coms.user ? 'float':''">
                            <h4>{{ coms.nom }}</h4>
                            <p :class="coms.user ? 'border':''">{{ coms.message }}</p>
                        </div>
                    </div>
                </div>s
                <div class="send">
                    <textarea name="" id="" cols="50" rows="3"></textarea><div>icon</div>
                </div>
            </div>        
        </transition>
    </section>

</template>
<script>
import axios from 'axios'
import modifiertxt from '../directives/modifierDirect'
export default{
    props: ['idCours'],
    directives:{modifiertxt},
    data() {
        return {
            chapitres:[],
            chapitre:null,
            partie:0,
            commentaire:[],
            active:false
        }
    },
    mounted(){
        axios.get("/Interface professeur/"+this.idCours+"/Création contenu/")
        .then((response)=>{
            console.log(JSON.parse(response.data.contenue))
            this.chapitres=JSON.parse(response.data.contenue)
        })
        .catch((error)=>{
            console.log(error)
        })
    },
    computed:{
        numPartie(){
            return this.partie
        },
        numchapitre(){
            return this.chapitre
        }
    },
    methods:{
        commentaires(){
            this.active=!this.active
        }
    }
}

</script>
<style>
    input{
        background-color: #ffff;
        padding-left: 10px;
        border: none;
        height: 30px;
        width: 150px;
        border-radius: 30px;
    }
    .couleurEdit{
        background-color: cadetblue;
    }
    .parametre{
        display: grid;
        margin-right: 0%;
        align-content: center;
    }
    .btn{
        background-color: #ffff;
        color:rgb(0, 0, 71);
        border: none;
        margin: 10px;
        height: 50px;
        width: 150px;
        border-radius: 30px;

    }
    section{
        display: flex;
        background-color: rgb(0, 0, 71);
        height: 80vh;

    }
    .contenue{
        width: 60%;
        overflow-y: scroll;
        padding-right: 10px;
        padding-right: 53px;
        background-color: rgb(222, 222, 248);
    }
    .jaune{
        background-color: #fdbe00;
        position: absolute;
        bottom: 10px;
        margin-left: 7%;
    }
    .pagination a {color: black;float: left;padding: 8px 16px;text-decoration: none; transition: background-color .3s;}

    .pagination a.active {background-color: dodgerblue;color: white;}

    .pagination a:hover:not(.active) {background-color: #ddd;}
    .page{
        background-color:#ffff;
        position: absolute;
        bottom: 0px;
    }
    .icon{
        display: none;
        position: absolute;
        right: 1%;
        color:rgb(0, 0, 71);
        width: 100px;
    }
    .iconn{
        left: 10px !important;
    }
    .contenuee:hover .icon{
        display: block;
    }
    .chapitree:hover .icon{
        display: block;
    }
    .icon:hover{
        color:  rgb(30, 149, 253);
    }
    .chp{
        background-color: #dedef8;
        color:#000047 !important;
    }
    .chp h3{
        margin-top: 0px;
        margin-bottom: 0px;
    }
    .radius{
        background-color: #dedef8;
        width: 20px;
        height: 20px;
        position: relative;
        left: 91.3%;
    }
    .radius div{
        width: 100%;
        height: 100%;
        background-color: #000047;
    }
    .bas{
        bottom: -20px;
    }
    .bas div{
        border-top-right-radius: 100%;
    }
    .haut{
        top: -20px;
    }
    .haut div{
        border-bottom-right-radius: 100%;
    }
    .sidenav {
        width: 500px;
        position: relative;
        z-index: 1;
        top: 0;
        font-size: 12px;
        right: 0;
        background-color: #f1f1f1;
        /* overflow-x: hidden; */
        transition: 0.5s;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 60px;
    }

    .sidenav > div > div{
        margin-bottom: 10px;
    }
    .sidenav >div > div > div > h4{
        margin-bottom: 0;
        background-color: #ccc7c7;;
        width: max-content;
        padding-left: 10px;
        padding-right: 10px;
        border-radius: 10px 10px 0 0;
    }
    .sidenav >div > div > div > p{
        margin-top: 0;
        margin-bottom: 0;
        padding: 10px;
        max-width: 86%;
        background-color: #f1f1f1;;
        width: max-content;
        padding-left: 10px;
        padding-right: 10px;
        border-radius: 0 10px 10px 10px;
        box-shadow: 0px 4px 20px 1px #000000;
    }
    .float{
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
    .border{
        border-radius: 10px 0 10px 10px !important;
    }
    .send{
        display: flex;
        position: relative;
        width: 100%;
        padding: 5px;
        background-color: #ccc7c7;
        z-index: 1;
        margin-left: -10px;
        margin-right: -10px;
        box-shadow: 0px 1px 20px 0px #001a4b;
    }
    .send textarea{
        height: 25px;
        /* width: 80%; */
        box-shadow: 0px 4px 20px 1px #001a4b;
        border-radius: 5px;

    }
    .send div{
        cursor: pointer;
        box-shadow: 0px 4px 20px 1px #001a4b;
        margin-left: 10px;
        width: 25px;
        height: 25px;
        text-align: center;
        padding-top: 8px;
        border-radius: 10px;
    }
    .affiche-enter-active, .affiche-leave-active{
        transition: transform 1s;
    }
    .affiche-enter, .affiche-leave-active{
        transform: translateX(500px);
    }

</style>
