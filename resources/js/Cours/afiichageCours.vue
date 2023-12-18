<template>
    <transition name="chargement">
        <div v-if="chargement" class="sidenav1" key="active"> <!-- v-if -->
            <div class="loader centre"></div>
        </div>    
    </transition>

    <section style="height: 100vh;text-align: center;">
        <div style="width: 20vw;">
            <p style="color: white;">chapitre</p><br>
            <div class="chapitree" v-for="chp,i in chapitres" :key="chp"
                :class="chapitre===chp ? 'chp':''"
                >
                <div v-if="chapitre===chp " class="radius haut"><div></div></div>
                <h3
                    :style="chapitre===chp? 'color:#000047':'color: white;'"
                    @click="chapitre=chp;partie=0;i1=i"
                >{{chp.nom}}</h3>
                <div v-if="chapitre===chp " class="radius bas"><div></div></div>
            </div>
        </div>
        <div class="contenue" style="width: 80%;">
            <div v-if="numchapitre!==null">
                <div @dblclick="commentaires(i)" class="contenuee"  v-for="contenue,i in numchapitre.partie[numPartie].cours" :key="contenue">
                    <i @click="commentaires(i)" class="fa fa-comment-o icon" style="font-size:24px"></i>
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
                    <p >&laquo;</p>
                    <a
                        :class="partie==i-1?'active':''"
                        @click="partie=i-1;i2=i-1"
                        v-for="i in numchapitre.partie.length" :key="i"
                    >{{i}}</a>
                    <a >&raquo;</a>
                </div>
            </div>
        </div>
    </section>
    <transition name="affiche">
        <div class="sidenav1" v-if="active" key="active"> <!-- v-if -->
        <div v-if="chargement" class="loader centre"></div>
            <div class="sidenav"><p style="font-size: 25px;" @click="commentaires">&times;</p>
                <div style="overflow-y: scroll;height: 80vh;" >
                    <div><!-- v-if axios -->
                        <div v-for="coms,i in commentaire">
                            <div :class="coms.user.id==uuser ? 'float':''">
                                <h4>{{ coms.nom_utilisateur }}</h4>
                                <p :class="coms.user.id==uuser ? 'border':''">{{ commmentairePhrase(coms.comentaires) }}</p>
                            </div>
                        </div>
                    <div id="coms" ref="coms" style="height: 70px;"></div>
                    </div>
                </div>
                <div class="send">
                    <textarea name="" id="" cols="50" rows="3" v-model="coms"></textarea>
                    <a href="#coms"><div @click="envoyer">icon</div></a>
                </div>
            </div>
        </div>
    </transition>
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
            active:false,
            chargement:false,
            i1:0,
            i2:0,
            i3:0,
            coms:'',
            uuser:0
        }
    },
    mounted(){
        this.chargement=true
        axios.get("/Interface professeur/"+this.idCours+"/Création contenu/")
        .then((response)=>{
            // console.log(JSON.parse(response.data.contenue))
            this.chapitres=JSON.parse(response.data.contenue)
            this.chargement=false
        })
        .catch((error)=>{
            this.chargement=false
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
        envoyer(){
            if(this.coms.length>0){
                const id=`${this.i1},${this.i2},${this.i3},`
                let message=id+this.coms
                this.coms=''
                let data=new FormData()
                data.append('coms',message)
                axios.post(`/Interface professeur/${this.idCours}/commentaire`,data)
                .then((response)=>{
                    const data=response.data
                    this.commentaire.push({'user':{'id':this.uuser},'nom_utilisateur':data.nom,'comentaires':data.comentaires})
                    // this.$refs.coms.scrollIntoView()
                })
                .catch((error)=>{
                    console.log(error)
                })
            }
        },
        // watch:{
        //     commentaire:function(value){
        //         this.$refs.coms.scrollIntoView()
        //     }
        // },
        commentaires(i3){
            this.active=!this.active
            if(this.active){
                this.i3=i3
                const id=`${this.i1},${this.i2},${i3},`
                this.chargement=true
                axios.get(`/Interface professeur/${this.idCours}-${id}/commentaire`)
                .then((response)=>{
                    this.chargement=false
                    // console.log(response.data.coms)
                    this.commentaire=response.data.coms
                    this.uuser=response.data.id
                    // this.$refs.coms.scrollIntoView()
                })
                .catch((error)=>{
                    this.chargement=false
                    console.log(error)
                })
                
            }else{
                this.commentaire=[]
            }
            
        },
        commmentairePhrase(text){
            const tableau=text.split(",")
            return tableau.slice(3, tableau.length).toString();
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
    .affiche-enter-active{
        animation: apparition .5s;
    }
    .affiche-leave-active{
        animation: disparition .5s;
    }
    @keyframes apparition {
        from{transform: scale(0,0);opacity: 0;}
        to{transform: scale(1,1);opacity: 1;}
    }
    @keyframes disparition {
        from{transform: scale(1,1);opacity: 1;}
        to{transform: scale(3,3);opacity: 0;}
    }
    .chargement-enter-active{
        animation: apparition1 .5s;
    }
    .chargement-leave-active{
        animation: disparition1 .5s;
    }
    @keyframes apparition1 {
        from{opacity: 0;}
        to{opacity: 1;}
    }
    @keyframes disparition1 {
        from{opacity: 1;}
        to{opacity: 0;}
    }



</style>
