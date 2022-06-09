<template>
    <div class="container">
        <form class="form" @submit.prevent="submit">
            <div>
                <h2>Update your profile </h2>
                <p>Change you </p>
            </div>
            <div>
                <label for="">Business name</label>
                <input type="text" placeholder="Enter your business name here" v-model="store.professionalData.name" required>
            </div>
            <div>
                <label for="">Professional category</label>
                <input type="text" placeholder="Enter your business category" v-model="store.professionalData.professional_category" required>
            </div>
            <div>
                <label for="">Phone number</label>
                <input type="text" placeholder="For potential clients to reach you" v-model="store.professionalData.phone_number" required>
            </div>
            <div>
                <label for="">Address</label>
                <input type="text" v-model="store.professionalData.address" required>
            </div>
            <div>
                <label for="">Business WebSite Address</label>
                <input type="text" placeholder="WWW." v-model="store.professionalData.business_site" required>
            </div>
            <div>
                <label for="">Contact name</label>
                <input type="text" placeholder="Full name" v-model="store.professionalData.name" required>
            </div>
            <div>
                <label for="">Create Your free Account</label>
                <input type="text" placeholder="Enter your e-mail" v-model="store.professionalData.email" required>
            </div>
            <div>
                <input type="password" placeholder="Current Password" v-model="passwordData.oldPassword" >   
            </div>
            <div>
                <input type="password" placeholder="New Password" v-model="passwordData.newPassword" >   
            </div>
            
            <div>
                <button @click="update">Update</button>
            </div>
        </form>
    </div>
    <UpdateDone data-aos="fade-left" v-if="pop"/>
</template>

<script setup>
import {ref,computed,reactive} from "vue"
import { usePros } from "../../store/test"
import Cookies from 'js-cookie'
import UpdateDone from "../../components/UpdateDone.vue"

const passwordData = reactive({
    id:Cookies.get("idPros"),
    oldPassword:"",
    newPassword:""
})
const pop = ref(false)

const store = usePros()

const update = ()=>{
    store.editProfile()
    pop.value = true
    setTimeout(() => {
    pop.value = false
    },2000);

    if(passwordData.oldPassword.length>0 && passwordData.newPassword.length>0){
            store.changePassword(passwordData)
    }
}


</script>









<style lang="scss" scoped>
.container{
    width: 100%;
    height: 94vh;
    color: black;
    display: flex;
    justify-content: center;
    .form{
        width: 97%;
        height: max-content;
        display: grid;
        grid-template-rows: repeat(8,1fr);
        margin: auto;
        row-gap: 10px;
        div{
            display: flex;
            flex-direction: column;
            font-weight: bold;
            .error{
                color: rgba(221, 0, 0, 0.84);
            }
            input{
                width:80%;
                height: 30px;
                padding: 7px;
                border: 2px solid #eee;
                font-size: 16px;
                color: black;
            }
            input:focus{
                outline: none;  
            }
            button{
                width: 150px;
                height: 40px;
                font-size: 18px;
                color: white;
                background-color: rgba(0, 0, 0, 0.908);
                border: none;
                border-radius: 3px;
                &:hover{
                    cursor: pointer;
                    background-color: rgba(0, 0, 0, 0.849);
                }
            }
        }
        .check{
            input{
                width: max-content;
                height: max-content;
                padding: 0px;
                margin-top: 4px;
                margin-right: 4px;
                
            }
            display: flex;
            flex-direction: row;
            span{
                font-size: 13px;
                font-weight: normal;
                span{
                    color: gray;
                }
            }
        
        }
    }
    .pic{
        background-image: url('../../assets/profile-preview-bg@2x.png');
        background-size: cover;
        background-position: center;
        position: relative;
        h2{
            position: absolute;
            top: 287px;
            left: 147px;
        }
        p{
            position: absolute;
            top:  317px;
            left: 150px;
        }
    }
}
</style>