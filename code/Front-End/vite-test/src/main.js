import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from "./router/index"
import App from './App.vue'
import '../main.scss'
import AOS from "aos"
import "aos/dist/aos.css"
import Cookies from 'js-cookie'





AOS.init();




const app =  createApp(App) 
app.use(createPinia())
app.use(router);

app.mount('#app')




