<template>
    <div class="super-container">
            <h1>Get Ideas </h1>
        <div class="container">
            <div v-for="picture in pictures" :key="picture.id" >
                <img :src="picture.url" alt="">
                <span>
                    {{picture.date_creation}}
                    <!-- <img src="https://img.icons8.com/ios/24/000000/like--v1.png"/> -->
                </span>
                <h2>{{picture.title}}</h2>
                <p>{{picture.description}}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import {onMounted,ref} from "vue"

var pictures = ref()

const getPictures = async()=>{
    let res = await fetch('http://homlee.api/gallery/get',{
        method:'POST'
    })
    let json = await res.json()
    pictures.value  = await json.data 
    console.log(pictures.value)

} 
onMounted(()=>{
    getPictures()
})




</script>

<style  lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,200&display=swap');
.super-container{
    width: 100%;
    height: max-content;
    h1{
        width: 80%;
        margin: auto;
        margin-bottom: 10px;
    }
    .container{
        width: 80%;
        height: max-content;
        margin: auto;
        display: grid;
        gap: 1rem;
        grid-template-columns: repeat(auto-fit,minmax(400px,1fr));
        grid-auto-rows:auto;
        div{
            // border: 1px solid ;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            img{
                width: 90%;
            }
            p{
                margin-top: 10px;
                width: 90%;  
                text-align: justify;
                color: gray;
                font-size: 15px;
                
            }
            h2{
                font-family: 'Roboto Flex', sans-serif;
                letter-spacing: 2px;
                width: 90%;  
                margin-top: 2px;
                font-size: 20px;
            }
            span{
                font-size: 14px;
                margin-top: 10px;
                width: 90%;
                color: rgb(107, 107, 107);
                letter-spacing: 2px;
                display: flex;
                justify-content: space-between;
                img{
                    width: 20px;
                    height: 20px;
                    cursor: pointer;
                }
            }
        }
    }
}
@media screen and (max-width:500px) {
.super-container{
    .container{
        
        div{
            width: 70%;
        }
            }
    }
}
</style>