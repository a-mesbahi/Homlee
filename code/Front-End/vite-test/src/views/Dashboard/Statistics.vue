<template>
    <div class="statistics">
        <div class="top-side">
            <h1>Add to gallery</h1>
        </div>
        <div class="underside">
            <div class="infos">
                <figure class="image-block" v-for="element in adds" :key="element.id">
                    <h1>{{element.title}}</h1>
                    <img :src="element.url" alt="" />
                    <figcaption>
                        <h3>
                            More Info
                        </h3>
                        <p>{{element.description}}</p>
                        <button>
                            More Info
                        </button>
                    </figcaption>
                </figure>
                <div class="Add-section" v-if="addSection" @click="toggle">
                    <img src="https://img.icons8.com/external-dreamstale-lineal-dreamstale/64/000000/external-add-ui-dreamstale-lineal-dreamstale.png"/>
                </div>
                <div class="Add-from" v-if="addPop">
                    <div class="input-grp">
                        <label for="">Title : </label>
                        <input type="text">
                    </div>
                    <div class="input-grp">
                        <label for="">Image : </label>
                        <input type="text">
                    </div>
                    <div class="textarea">
                        <label for="">Description : </label>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="button">
                        <button>Save to gallery</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup >
import Courbe from "../../components/Courbe.vue"
import {ref,onMounted} from "vue"
const addSection = ref(true)
const addPop = ref(false)

const toggle = ()=>{
    addSection.value = !addSection.value
    addPop.value = !addPop.value
}
const adds = ref([])

const getAdds = async()=>{
    let res = await fetch("http://homlee.api/gallery/getForAdmin")
    let json = await res.json()
    adds.value = json.data
}
onMounted(()=>{
    getAdds()
})

</script>

<style scoped lang="scss">


$base-duration: 500ms;
$or : #bea100;

.statistics{
    width: 100%;
    height: 100vh;
    @media screen and (max-width:800px) {
        height: max-content;
    }
    .top-side{
        width: 100%;
        height: 10vh;
        display: flex;
        align-items: center;
        box-sizing: border-box;
        padding-left: 20px;
    }
    .underside{
        width: 100%;
        height: 90vh;
        @media screen and (max-width:800px) {
            height: max-content;
        }
        .infos{
            width: 100%;
            height: max-content;
            display: grid;
            grid-template-columns: repeat(4,minmax(400px,1fr));
            align-items: center;
            column-gap: 10px;
            row-gap: 7px;
            justify-content: space-around;
            box-sizing: border-box;
            padding: 20px;
            @media screen and(max-width:800px) {
                display: flex;
                flex-direction: column;
            }
            figure {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 400px;
                height: 690px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                overflow: hidden;
                @media screen and(max-width:800px) {
                    height: 534px;
                    width: 85%;
                }
                &:hover {
                    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                    img {
                        transform: scale(1.25);
                    }
                    figcaption {
                        bottom: 0;
                    }
                }
                p{
                    width: 90%;
                }
                h1 {
                    position: absolute;
                    top: 50px;
                    left: 20px;
                    margin: 0;
                    padding: 0;
                    color: white;
                    font-size: 20px;
                    font-weight: 100;
                    line-height: 1;
                }
                img {
                    height: 100%;
                    transition: 0.25s;
                }
                figcaption {
                    position: absolute;
                    bottom: -33%;
                    left: 0;
                    width: 100%;
                    margin: 0;
                    padding: 30px;
                    background-color: rgba(black,0.85);
                    box-shadow: 0 0 20px rgba(black,0.4);
                    color: white;
                    line-height: 1;
                    transition: 0.25s;
                    @media screen and (max-width:800px) {
                        bottom: -1%;
                        left: 0;
                        width: 85%;
                    }
                    h3 {
                        margin: 0 0 20px;
                        padding: 0;
                    }
                    p {
                        font-size: 14px;
                        line-height: 1.75;
                    }
                    button {
                        position: relative;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 10px 0 0;
                        padding: 10px 30px;
                        background-color: transparent;
                        border: 1px solid white;
                        color: white;
                        font-size: 14px;
                        &:hover{
                            cursor: pointer;
                            background-color:white ;
                            color: black;
                        }
                    }
                }
            }

            .Add-section{
                height: 690px;
                border: 2px dashed gray;
                background-color:transparent;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 48px;
                @media screen and (max-width:800px) {
                    width: 85%;
                }
                &:hover{
                    cursor: pointer;
                }
            }
            .Add-from{
                height: 690px;
                border: 2px dashed gray;
                background-color:transparent;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                align-items: center;
                box-sizing: border-box;
                padding-bottom: 20px;
                padding-top: 20px;
                @media screen and (max-width:800px) {
                    width: 85%;
                }
                .textarea{
                    display: flex;
                    flex-direction: column;
                    font-size: 18px;
                    font-weight: bold;
                    justify-content: center;
                    width: 90%;
                    textarea{
                        border: none;
                        border-bottom: 2px solid;
                        width: 90%;
                        height: 200px;
                        padding: 7px;
                        font-size: 16px;
                        &:focus{
                            outline: none;  
                            border-bottom:2px solid $or;
                        }
                    }
                }
                .input-grp{
                    display: flex;
                    flex-direction: column;
                    font-size: 18px;
                    font-weight: bold;
                    justify-content: center;
                    width: 90%;
                    input{
                        border: none;
                        border-bottom: 2px solid;
                        width: 90%;
                        height: 30px;
                        padding: 7px;
                        font-size: 16px;
                        &:focus{
                            outline: none;  
                            border-bottom:2px solid $or;
                        }
                    }
                }
                .button{
                    button{
                        width: 160px;
                        height: 50px;
                        background-color: transparent;
                        border: 1px solid;
                        font-size: 18px;
                        &:hover{
                            cursor: pointer;
                            background-color: black;
                            color: white;
                        }
                    }
                }
            }
        }
    }
}
</style>