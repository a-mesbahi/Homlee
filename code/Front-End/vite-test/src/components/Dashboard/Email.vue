<template>
    <div class="container-email" @click.self="close">
        <div class="form">
            <div class="header">
                <img src="https://img.icons8.com/ios-glyphs/30/undefined/resize-diagonal.png"/>
                <img src="https://img.icons8.com/small/16/undefined/delete-sign.png" @click="close"/>
            </div>
            <div class="from">
                <span>From: </span>
                <p>Our Admine</p>
            </div>
            <div class="subject">
                <input type="text" placeholder="Enter the subject" v-model="dataForm.subject">
            </div>
            <div class="body">
                <textarea name="" id="" cols="30" rows="10" placeholder="Enter body" v-model="dataForm.body"></textarea>
            </div>
            <div class="send">
                <a href="mailto:xyz@abc.com">
                    Send now
                    <img src="/assets/send-email.png" alt="" srcset="">
                </a >
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref} from "vue"
import Cookies from 'js-cookie'
const emit = defineEmits(['close'])
const props = defineProps({
    profEmail:{
        type:Object,
        required:true
    }
})

const dataForm = ref({
    subject:"",
    body:"",
    name:props.profEmail.name,
    email:"aminmsb2003@gmail.com"
})

const close = ()=>{
    emit("close")
}

const send = async()=>{
    // let res = await fetch("http://homlee.api/admin/",{
    //     method:"POST",
    //     headers:{
    //         Authorization:Cookies.get("tokenAdmin"),
    //     },
    //     body:JSON.stringify(dataForm.value)
    // })
    // let json = await res.json()
    // console.log(json)
}


</script>

<style lang="scss" scoped>
.container-email{
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.202);
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    .form{
        width: 45%;
        height: 550px;
        background-color:white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        .header{
            display: flex;
            justify-content: flex-end;
            width: 100%;
            img{
                margin: 10px;
                width: 13px;
                &:hover{
                    cursor: pointer;
                }
            }
        }
        .from{
            width: 90%;
            height: 40px;
            box-sizing: border-box;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            span{
                color: gray;
            }
            p{
                font-size: 18px;
                text-decoration: underline;
                margin-left: 7px;                
            }
        }
        .subject{
            width: 90%;
            height: 60px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            input{
                border: 0px;
                width: 100%;
                font-size: 18px;
                height: 80%;
                &:focus{
                    outline: 0px ;
                }
            }
        }
        .body{
            width: 90%;
            height: 280px;
            margin-top: 10px;
            textarea{
                width: 100%;
                height: 100%;
                font-size: 18px;
                border: none;
                padding: 0px;
                &:focus{
                    outline: 0px ;
                }
            }
        }
        .send{
            width: 100%;
            height: 80px;
            background-color: #eee;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            button{
                background-color:black;
                border: 0px;
                color: white;
                width: 150px;
                height: 50px;
                display: flex;
                align-items: center;
                font-size: 18px;
                justify-content: space-evenly;
                margin-right: 10px;
                border-radius: 10px;
                img{
                    border-left: 1px solid white;
                    padding-left: 5px;
                }
            }
        }
    }
}


</style>