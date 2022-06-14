<template>
    <div class="login-container">
        <div class="decoration-left">
            <img src="https://i.pinimg.com/564x/b2/bf/df/b2bfdfd405d88ea3f3528a60490c9403.jpg" alt="">
        </div>
        <Register v-show="registerShow" @showLoginFrom="showLoginFrom"/>
            <form v-show="loginShow" action="" @submit.prevent="login">
                <h1>Login</h1>
                    <div class="input-grp">
                        <label for="">Your e-mail</label>
                        <input type="email" placeholder="E-mail" v-model="loginData.email">
                    </div>
                    <div class="input-grp">
                        <label for="">Your password</label>
                        <input type="password" placeholder="Password" v-model="loginData.password">
                    </div>
                    <div class="form-submit">
                        <p >Don't have an account ? <span @click="showRegisterFrom">Register</span></p>
                        <button >Login</button>
                    </div>
            </form>
            
        <div class="decoration-right">
            <img src="https://i.pinimg.com/564x/72/40/9a/72409add17ac5518a1dea4a4a1ef3515.jpg" alt="">
        </div>

    </div>
</template>

<script setup>
import {ref,onMounted} from 'vue'
import Register from "../components/Register.vue"
import { useRouter, useRoute } from 'vue-router'
import Cookies from 'js-cookie'




const registerShow = ref(false)
const loginShow = ref(true)
const router = useRouter();


const loginData = ref({
    email:"",
    password:""
})

const showRegisterFrom = ()=>{
    registerShow.value = !registerShow.value
    loginShow.value = !loginShow.value
}
const showLoginFrom = ()=>{
    loginShow.value = !loginShow.value
    registerShow.value = !registerShow.value
}

const login = async()=>{
    let res = await fetch("http://homlee.api/client/login",{
        method:'POST',
        headers: { "Content-Type": "application/json" },
        body:JSON.stringify(loginData.value)
    })
    let json = await res.json()
    Cookies.set('token',json.data.token)
    await router.push('/')
}




</script>

<style lang="scss" scoped>
$or : #bea100;
.login-container{
    width: 80%;
    height:80vh;
    display: flex;
    .decoration-left{
        width: 20%;
        height: 100%;
        // background-color: chartreuse;
        img{
            width: 30%;
        }img{
            width: 30%;
        }
    }

    form{
        width: 60%;
        height:100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        h1{
            margin-top: -30px;
            margin-bottom: 20px;
        }
        .input-grp{
            width: 50%;
            height: 70px;
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            font-weight: bold;
            input{
                height: 40px;
                border:none;
                border-bottom:2px solid;
                padding:6px ;
                font-size: 16px;
            }
            input:focus{
                outline: none;  
                border-bottom:2px solid $or;
            }
        }
        .form-submit{
            width: 50%;
            height: 90px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            span{
                color: rgb(67, 67, 242);
                cursor: pointer;
                text-decoration: underline;
            }
            span:hover{
                text-decoration: none;
            }
            button{
                width:150px;
                height: 50px;   
                font-size: 18px;
                padding: 8px;
                background-color: transparent;
                border: 2px solid ;
            }
            button:hover{
                cursor: pointer;
                background-color: rgba(0, 0, 0, 0.85);
                color: white;
                transition:300ms ease-in-out;
            }
        }
    }

    .decoration-right{
        width: 20%;
        height: 100%;
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
        img{
            width: 40%;
        }
    }
}
@media screen and (max-width:400px) {
    .login-container{
        width: 100%;
        .decoration-left,.decoration-right{
            display: none;
        }
        form{
            width: 100%;
            .input-grp{
                width: 75%;
            }
            .form-submit{
                width: 75%;
            }
        }

    }
}
</style>