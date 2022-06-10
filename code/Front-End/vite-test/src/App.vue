<script setup>
import NavbarComponent from './components/NavbarComponent.vue'
import FooterComponent from './components/FooterComponent.vue'
import router from "./router/index"
import { useRouter, useRoute } from 'vue-router'
import { useStore } from './store/test.js'
import { onBeforeMount, onMounted ,ref} from 'vue'

const store = useStore()
  
const route = useRoute()

  const showElement = ref(true) 



const getProducts = async()=>{
  let res = await fetch('http://homlee.api/products/findAllProducts')
  let json  = await res.json()
  store.listProducts = json.data
}
const getProfessionals = async()=>{
    let res = await fetch('http://homlee.api/professional/findAllProfessionals')
    let json  = await res.json()
    store.listProfessionals = json.data
}





onMounted(() => {
  getProducts()
  getProfessionals()
})  



</script>

<template>
  <NavbarComponent v-if="!route.path.includes('/dashboard') && !route.path.includes('/professional/profile') && !route.path.includes('/login_prof')" />
  <router-view class="body"></router-view>
  <FooterComponent v-if="!route.path.includes('/dashboard') && !route.path.includes('/professional/profile')  && !route.path.includes('/login_prof')" class="footer" />
</template>

<style lang="scss">
html{
  scroll-behavior: smooth;
}
$or : #bea100;
#app{
  display: flex;
  flex-direction: column;
  align-items: center;
}
*{
  padding: 0px;
  margin: 0px;
  font-family: Poppins;
}

.footer{
  margin-top: auto;
}
.input-grp{
    width: 80%;
    min-height: 70px;
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
    font-weight: bold;
    input[type=number] {
      width: 50%;
    }
    input{
        width: 100%;
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
.message{
  color: rgb(179, 179, 179);
  text-decoration: none;
  font-size: 13px;
  font-weight: lighter;
  list-style: none;
}
select{
  width: 80%;
  border: 2px solid ;
  height: 40px;
  label{
      margin-bottom: 3px;
  }
}
textarea{
  width: 100%;
  resize: none;
  border: 2px solid;
  box-sizing: border-box;
  padding: 7px;
  label{
      margin-bottom: 3px;
    }
}

</style>
