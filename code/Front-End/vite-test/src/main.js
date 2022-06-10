import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from "./router/index"
import App from './App.vue'
import '../main.scss'
import AOS from "aos"
import "aos/dist/aos.css"
import Cookies from 'js-cookie'
import { plugin, defaultConfig } from '@formkit/vue'






AOS.init();




const app =  createApp(App) 
app.use(createPinia())
app.use(router);
app.use(plugin, defaultConfig({
config: {
    classes: {
        outer: 'input-grp',
        message: 'message',
    }
}
}))
app.mount('#app')




