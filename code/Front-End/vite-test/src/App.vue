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

</style>
