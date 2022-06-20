<template>
    <div class="container-pop">
        <div class="content">
            <h1>WELCOME AMONG US</h1>
            <div class="first-paragraph">
                <h3>Homlee is your platform</h3>
                <p>Homlee is the leading platform for connecting individuals seeking household services and tradesmen with pre-screened, high-quality independent service professionals.</p>
            </div>
            <img src="/public/assets/guide.jpg" alt="" srcset="">
            <div class="guide">
                <div>
                    <span>1-Login</span>
                    <p>- Go to the menu bar, choose "For Our Profs", then enter your email and password.</p>
                </div>
                <div>
                    <span>2-Add Project</span>
                    <p>- After you login, you can add your completed project to your profile to enrich your experience and have a better chance of getting your first job.</p>
                </div>
                <div>
                    <span>3-Edit your profile</span>
                    <p>- you can change your personal information to update it .</p>
                </div>
            </div>
            <button @click="close">Go</button>
        </div>
    </div>
</template>

<script setup>
import {defineProps} from "vue"

const emit = defineEmits(['popUp'])
const close = ()=>{
    emit("popUp")
}

</script>

<style lang="scss" scoped>
.container-pop{
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
    .content{
        width: 35%;
        height: 90vh;
        background-color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
        h1{
            font-family: 'Roboto Flex', sans-serif;
            letter-spacing: 2px;
        }
        p{
            color: rgb(165, 165, 165);
        }
        .first-paragraph{
            width: 90%;
            height: 120px;
            p{
                text-align: justify;
                width: 90%;
                font-size: 17px;
            }
        }
        img{
            width: 350px;
        }
        .guide{
            width: 90%;
            height: 200px;
            border-left: 1px solid;
            box-sizing: border-box;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            span{
                font-weight: bolder;
            }
            p{
                width: 90%;
                padding-left: 10px;
                font-size: 14px;
                color: rgb(71, 71, 71);
                text-align: justify;
            }
            
        }
        button{
            border: none;
            background-color: black;
            color: white;
            width: 120px;
            height: 40px;
            font-size: 18px;
            letter-spacing: 2px;
            &:hover{
                cursor: pointer;
            }
        }
    }
    
}
</style>