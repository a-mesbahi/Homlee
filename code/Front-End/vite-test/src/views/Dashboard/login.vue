<template>
    <div class="container">
        <h3 class="logo">Homlee</h3>
        <div class="form">
            <h3>Welcome Admin</h3>
            <p>Please enter your e-mail and password:</p>
            <div class="input-grp">
                <label for="">Email</label>
                <input type="email" placeholder="Email" v-model="dataForm.email">
            </div>
            <div class="input-grp">
                <label for="">Password</label>
                <input type="password" placeholder="Password" v-model="dataForm.password">
            </div>
            <button @click="login">Login</button>
        </div>
    </div>
</template>

<script setup>
import {ref} from "vue"
const dataForm = ref({
    email:"",
    password:""
})


const login = async()=>{
    let res = await fetch("http://homlee.api/client/login",{
        method:'POST',
        headers: { "Content-Type": "application/json" },
        body:JSON.stringify(loginData.value)
    })
    let json = await res.json()
    Cookies.set('idProfessional',json.data.id)
    await router.push('/')
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