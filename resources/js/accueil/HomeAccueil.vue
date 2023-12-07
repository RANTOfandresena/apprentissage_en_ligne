<template>
    <div style="overflow-y: hidden;position: relative;">
        <div>
            <div class="text">
                <h1>APPRENTISSAGE EN LIGNE</h1>
                <h2 style="color: aqua;">AAAAAAAA</h2>
                <p v-manoratra>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, fuga rerum quasi similique rem dolor eaque veniam doloribus, id soluta, minima earum pariatur deleniti? Consequuntur molestias praesentium optio laborum voluptas.</p>
            </div>
            <div id="rectange1">
                <div id="rectange2">
                    <img src="/petit-garcon-faisant-ecole-ligne.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import manoratra from '../directives/ManoratraDirective'
    export default{
        directives:{manoratra}
    }
</script>
<style>
    .text{
        color: white;
        margin-top: 20%;
        margin-left: 25px;
        width: 32%;
    }
    #rectange1{
        width: 30vw;
        height: 30vw;
        border-radius: 11%;
        transform: rotate(45deg);
        position: absolute;
        left: 53%;
        bottom: 14%;
        border:  5px solid #00a3e6;
    }
    #rectange2{
        width: 28.5vw;
        height: 28.5vw;
        background-color: #00a3e6;
        border-radius: 11%;
        margin: 10px;
    }
    #rectange2 img {
        width: 100%;
        height: 100%;
        border-radius: 11%;
    }
</style>
