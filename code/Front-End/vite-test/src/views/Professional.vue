<template>
    <div class="projects-container">
        <div class="projects-empty" v-if="!projects.length">
            <img src="/assets/empty.png" alt="" srcset="">
        </div>
        <div class="project" v-else v-for="project in projects" :key="project.id" >
            <div class="img">
                <h4>Homlee</h4>
                <div class="content" :style="{ backgroundImage: `url(/assets/${project.img})` }">
                </div>
            </div>
            <div class="project-infos">
                
                <section>
                    <div class='scrolldown' style="--color: black">
                        <div class="chevrons">
                            <div class='chevrondown'></div>
                            <div class='chevrondown'></div>
                        </div>
                    </div>
                    <h1>{{project.professional_category}}</h1>
                    <p>{{project.title}}</p>
                </section>
                <section>
                    <p>{{project.description}}</p>
                    <span>Date : 08-11-2002</span>
                </section>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref, onMounted} from "vue"
import {useRoute} from "vue-router"
const route = useRoute()
const id = route.params.id
const projects = ref([])

const getProjects = async ()=>{
    let res = await fetch(`http://homlee.api/client/getPorProjects/${id}`)
    let json = await res.json()
    projects.value = json.data
    console.log(json.data);
}

onMounted(()=>{
    getProjects()
})


</script>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Amiri:ital@1&family=Ubuntu&display=swap');
.projects-container{
    width: 80%;
    height: max-content;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 60px;
    .projects-empty{
        margin:-30px;
        width: 80%;
        height:90vh;
        display: flex;
        justify-content: center;
        img{
            // width: 45%;
        }
        
    }
    .project{
        width: 80%;
        height: 500px;
        border: 1px solid rgba(189, 189, 189, 0.933);
        margin-bottom: 10px;
        margin-top: 10px;
        position: relative;
        display: flex;
        @media screen and (max-width:800px) {
            flex-direction: column;
            width: 100%;
            height: 100%;
        }
        h4{
            position: absolute;
            top: 10px;
            left: 7px;
            font-family: 'Ubuntu', sans-serif;
            letter-spacing: 3px ;
        }
        .img{
            width: 50%;
            height: 100%;
            border-right: 1px solid;
            display: flex;
            justify-content: center;
            align-items: center;
            @media screen and (max-width:800px) {
                width: 100%;
                height: 300px;
                border: 0px;
            }
            .content{
                width: 80%;
                height: 80%;
                border-top-left-radius: 100px;
                background-position: center;
                background-size: cover;
            }
        }
        .project-infos{
            width: 50%;
            height: 100%;
            scroll-snap-type: y mandatory;
            overflow-y: scroll;
            position: relative;
            .scrolldown {
                --color: white;
                --sizeX: 30px;
                --sizeY: 50px;
                position: absolute;
                right: 10px;
                bottom: 15px;
                width: var(--sizeX);
                height: var(--sizeY);
                margin-left: var(sizeX / 2);
                border: calc(var(--sizeX) / 10) solid var(--color);
                border-radius: 50px;
                box-sizing: border-box;
                margin-bottom: 16px;
            }

            .scrolldown::before {
            content: "";
            position: absolute;
            bottom: 30px;
            left: 50%;
            width: 6px;
            height: 6px;
            margin-left: -3px;
            background-color: var(--color);
            border-radius: 100%;
            animation: scrolldown-anim 2s infinite;
            box-sizing: border-box;
            box-shadow: 0px -5px 3px 1px #ffffff66;
            }

            @keyframes scrolldown-anim {
            0% {
                opacity: 0;
                height: 6px;
            }
            40% {
                opacity: 1;
                height: 10px;
            }
            80% {
                transform: translate(0, 20px);
                height: 10px;
                opacity: 0;
            }
            100% {
                height: 3px;
                opacity: 0;
            }
            }
            .chevrons {
            padding: 6px 0 0 0;
            margin-left: -3px;
            margin-top: 48px;
            width: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            }
            .chevrondown {
            margin-top: -6px;
            position: relative;
            border: solid var(--color);
            border-width: 0 3px 3px 0;
            display: inline-block;
            width: 10px;
            height: 10px;
            transform: rotate(45deg);
            }
            .chevrondown:nth-child(odd) {
            animation: pulse 500ms ease infinite alternate;
            }
            .chevrondown:nth-child(even) {
            animation: pulse 500ms ease infinite alternate 250ms;
            }
            @keyframes pulse {
            from {
                opacity: 0;
            }
            to {
                opacity: 0.5;
            }
            }
            @media screen and (max-width:800px) {
                width: 100%;
                height: max-content;
            }
            &::-webkit-scrollbar {
                display: none;
            }
            section{
                flex: none;
                width: 100%;
                height: 100%;
                scroll-snap-align:  start;
                &:nth-of-type(1){
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-end;
                    box-sizing: border-box;
                    padding-left: 10px;
                    h1{
                        font-size: 40px;
                        letter-spacing: 2px;
                    }
                    p{
                        font-size: 30px;
                        letter-spacing: 2px;
                    }
                }
                &:nth-of-type(2)
                {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    box-sizing: border-box;
                    padding: 30px;
                    text-align: justify;
                    font-size: 18px;
                    font-weight: 600;
                    position: relative;
                    span{
                        position: absolute;
                        top: 7px;
                        right: 7px;
                        font-size: 14px;
                        font-weight: lighter;
                        color: rgba(198, 198, 198, 0.933);
                    }
                }
            }
        }
    }
}
</style>