<template>
    <div class="container">
        <h3 class="logo"><router-link to="/">Homlee</router-link></h3>
        <div class="form">
            <h3>Welcome Admin</h3>
            <p>Please enter your e-mail and password:</p>
            <FormKit
            type="text"
            label="Email"
            placeholder="Email"
            validation="required|length:10"
            v-model="dataForm.email"
            />
            <FormKit
                type="password"
                name="password"
                label="Password"
                placeholder="Password"
                validation="required"
                v-model="dataForm.password"
            />
            <button @click="login">Login</button>
        </div>
    </div>
</template>

<script setup>
import {ref} from "vue"
import Cookies from 'js-cookie'
import {useRouter} from "vue-router"
const router = useRouter()
const dataForm = ref({
    email:"",
    password:""
})


const login = async()=>{
    let res = await fetch("http://homlee.api/admin/login",{
        method:'POST',
        headers: { "Content-Type": "application/json" },
        body:JSON.stringify(dataForm.value)
    })
    let json = await res.json()
    console.log(json);
    if(json.data.status){
        Cookies.set('tokenAdmin',json.data.token)
        await router.push('/dashboard')
    }else{
        console.log("dhd");
    }
}


</script>

<style lang="scss" scoped>
$or : #bea100;
.container{
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    .logo{
        letter-spacing: 10px;
        position: absolute;
        top: 10px;
        a{
            text-decoration: none;
            color: black;
        }
    }
    .form{
        padding: 30px;
        h3{
            letter-spacing: 2px;
        }
        p{
            margin-bottom: 60px;
        }
        width: 30%;
        height:max-content;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
        .input-grp{
            width: 80%;
            height: 70px;
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            font-weight: bold;
            input{
                background-color: #eee;
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
</style>