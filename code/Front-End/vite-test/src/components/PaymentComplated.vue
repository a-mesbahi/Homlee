<template>
    <div class="PopUpContainer" >
        <div class="popUp">
            <img src="/assets/women.png" alt="" srcset="">
            <div class="text">
                <h4>Your order will arrive in three days</h4>
                <p>If you did not receive your order, or if any error occurred, contact us through the contact page, by mail or by phone</p>
            </div>
            <button @click="close">Agree</button>
        </div>
    </div>

</template>

<script setup>
import { useRouter, useRoute } from 'vue-router'

const router = useRouter()

const emit = defineEmits(['close'])
const close = ()=>{
    emit("close")
    router.push("/Products")
}



</script>

<style lang="scss" scoped>
.PopUpContainer{
    width: 100vw;
    min-height: 100%;
    position:fixed;
    top: 0;
    left:0;
    z-index: 99;
    background-color: rgba(0, 0, 0, 0.192);
    display: flex;
    justify-content: center;
    align-items: center;
    .popUp{
        width: 35%;
        height: 70vh;
        background-color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        @media screen and (max-width:800px) {
            width: 90%;
        }
        img{
            width: 30%;
        }
        .text{
            width: 90%;
            height: 20%;
            display: flex;
            flex-direction: column;
            align-items: center;
            p{
                text-align: justify;
            }
        }
        button{
            width: 200px;
            height: 40px;
            background-color: black;
            color: white;
            border: 0px;
        }
    }
}
</style>?