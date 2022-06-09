<template>
<form  action="" @submit.prevent="Register">
    <h1>Register</h1>
    <div class="input-grp">
        <label for="">Full Name</label>
        <input type="text" placeholder="Full Name" v-model="data.fullname" />
    </div>
    <div class="input-grp">
        <label for="">Phone Number</label>
        <input type="number" placeholder="Phone Number" v-model="data.number" />
    </div>
    <div class="input-grp">
        <label for="">Your e-mail</label>
        <input type="text" placeholder="E-mail" v-model="data.email" />
    </div>
    <div class="input-grp">
        <label for="">Your password</label>
        <input type="password" placeholder="Password" v-model="data.password" />
    </div>
    <div class="form-submit">
        <p>Have already an account ? <span @click="showLoginFrom">Login</span></p>
        <button>Register</button>
    </div>
</form>
</template>

<script setup>
import { ref } from "vue";

const emit = defineEmits(["showLoginFrom"]);
const showLoginFrom = () => {
    emit("showLoginFrom");
};

const data = ref({
    fullname: "",
    number: "",
    email: "",
    password: "",
});

const Register = async () => {
    let response = await fetch("http://homlee.api/client/add", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data.value),
    });
    let json = await response.json();
    let message = await json.message;
    console.log(message);
    showLoginFrom()

};
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
