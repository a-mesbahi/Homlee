<template>
    <div class="container" v-if="projects.length">
        <router-link :to="{ name: 'SingleProduct', params: { id: element.id } }" tag="div" class="project" v-for="element in projects" :key="element.id" >
            <h2>{{element.title}}</h2>
            <p class="date">Date : {{element.date}}</p>
            <p>{{element.description}}</p>
            <div class="img" :style="{ backgroundImage: 'url(/assets/' + element.img + ')' }">
            </div>
            <div class="tags">
                <div class="tag" v-for="content in element.tags" :key="content.id" >
                    {{content.tag}}
                </div>
            </div>
        </router-link>
    </div>
    <div class="noData" v-if="!projects.length">
            <img src="/public/assets/wait.png" alt="" srcset="">
            <p>HELLO! Create Your first project</p>
    </div>
</template>

<script setup>
import {computed} from "vue"
import { usePros } from "../../store/test"
import Cookies from 'js-cookie'

const store = usePros()

const projects = computed(()=>store.professionalProjects)


</script>

<style lang="scss" scoped>
.noData{
        width: 100%;
        height: 93vh;
        margin: auto;
        color: black;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        img{
            width: 100px;
        }
}
.container
{
    width: 100%;
    height: 93vh;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(400px,1fr));
    gap: 20px;
    overflow: auto;
    box-sizing: border-box;
    padding: 10px;
    .container::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }
    .container::-webkit-scrollbar
    {
        width: 10px;
        background-color: #F5F5F5;
    }
    .container::-webkit-scrollbar-thumb
    {
        background-color: black;
        
        background-image: -webkit-gradient(linear, 0 0, 0 100%,
                        color-stop(.5, rgba(255, 255, 255, .2)),
                        color-stop(.5, transparent), to(transparent));  
    }
    a{
        text-decoration: none;
    }
    .project
    {
        color: black;
        height: 380px;
        border: 1px solid #eee;
        box-sizing: border-box;
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        p{
            font-size: 14px;
            font-weight: 550;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 370px;
        }
        h2{
            letter-spacing: 1px ;
            height: 45px;
        }
        .date{
            color: rgb(188, 188, 188);
            height: 30px;
        }
        .img{
            width: 95%;
            height: 150px;
            background-position:center;
            background-size: cover;
            background-repeat: no-repeat;
            margin: auto;
        }
        .tags{
            width: 90%;
            height: 50px;
            display: flex;
            margin: auto;
            .tag{
                width: max-content;
                height: max-content;
                padding: 6px;
                padding-left: 12px;
                padding-right: 12px;
                background-color: rgba(0, 0, 0, 0.896);
                color: white;
                border-radius:30px ;
                margin-right: 10px;
            }
        }
    }
}
</style>