<template>
    <div class="container">
        <h2>Professionals</h2>
        <div class="content">
            <div class="profile" v-for="prof in profs" :key="prof.id">
                <div class="picture">
                    <img :src="'https://avatars.dicebear.com/api/croodles/'+prof.name+'.svg'" alt="" srcset="">
                </div>
                <div class="infos">
                    <h3>{{prof.name}}</h3>
                    <a :href="prof.email" >{{prof.email}}</a>
                </div>
                <div class="rest">
                    <p>{{prof.address}}</p>
                    <div class="buttons">
                        <button>Projects</button>
                        <button @click="sendEmail(prof.email)">Send email</button>
                    </div>
                </div>
            </div>
        </div>
        <Email/>
    </div>
</template>

<script setup>
import {ref} from "vue"
import Email from "../../components/Email.vue"
const profs = ref('')


const getProfs = async()=>{
    let res = await fetch("http://homlee.api/professional/findAllProfessionals");
    let json = await res.json()
    profs.value = json.data
}

getProfs()







</script>

<style lang="scss" scoped>
.container{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    h2{
        padding: 20px;
    }
    .content{
        padding: 10px;
        width: 90%;
        height: 80.4vh;
        display: grid;
        grid-template-columns: repeat(auto-fill,minmax(300px,320px));
        row-gap: 30px;
        column-gap: 70px;
        overflow: auto;
        margin: auto;
        @media screen and (max-width:500px) {
            padding-left: 0px;
            padding-right: 0px;
        }
        .profile{
            height: 380px;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding-top: 10px;
            
            .picture{
                width:150px;
                height: 150px;
                border: 1px solid;
                border-radius: 100px;
            }
            .infos{
                text-align: center;
                height: 50px;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
            }
            .rest{
                width: 100%;
                height: calc(100% - 260px);
                background-color: rgba(238, 238, 238, 0.372);
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                align-items: center;
                p{
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    max-width: 80%;
                }
                .buttons{
                    width: 100%;
                    height: 50%;
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                    button{
                        width: 120px;
                        height: 45px;
                        background-color: transparent;
                        border: 1px solid;
                        font-size: 16px;
                        letter-spacing: 1px;
                        &:hover{
                            cursor: pointer;
                            background-color: rgba(0, 0, 0, 0.848);
                            color: white;
                        }
                    }
                }
            }
        }
    }
    .content::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    .content::-webkit-scrollbar
    {
        width: 10px;
        background-color: #F5F5F5;
    }

    .content::-webkit-scrollbar-thumb
    {
        background-color: black;
        
        background-image: -webkit-gradient(linear, 0 0, 0 100%,
                        color-stop(.5, rgba(255, 255, 255, .2)),
                        color-stop(.5, transparent), to(transparent));  
    }
}

</style>
