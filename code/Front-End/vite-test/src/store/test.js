import { defineStore } from 'pinia'
import {ref,computed} from 'vue'
import { useRouter } from 'vue-router'
import Cookies from 'js-cookie'


export const useStore = defineStore('test',{
    state: () => ({
        // id:1,
        listProducts:[],
        listProfessionals:[],
        professionalInfos:null,
    }),
    actions : {
        async getProducts (){
            let res = await fetch('http://homlee.api/products/findAllProducts')
            let json  = await res.json()
            this.listProducts = json.data
        },
        
    }

})
























export const usePros = defineStore('professional', {
state: () => ({
    professionalData:"",
    professionalProjects:[],
}),

actions: {
    async loginProfessional(dataForm){
        let res = await fetch("http://homlee.api/professional/login",{
            method:"POST",
            body:JSON.stringify(dataForm)
        })
        let json = await res.json()
        if(!json.error){
            this.professionalData = await json.data
            Cookies.set('tokenPro',json.data.token)
        }
    },
    // async addProject(dataForm){
    //     let res = await fetch("http://homlee.api/professional/addProject",{
    //         method:"POST",
    //         body:JSON.stringify(dataForm)
    //     })
    // },
    async editProfile(token){
        let res = await fetch("http://homlee.api/professional/editProfile",{
            method:"POST",
            body:JSON.stringify(this.professionalData),
            headers:{
                Authorization:token,
            }
        })
    },
    async getProf(token){
        let res = await fetch(`http://homlee.api/professional/getOnePro`,{
            method:"POST",
            headers:{
                Authorization:token,
            }
        })
        let json = await res.json()
        this.professionalData = json.data[0]
    },
    async changePassword(passwordData){
        let res = await fetch("http://homlee.api/professional/changePassword",{
            method:"POST",
            body:JSON.stringify(passwordData),

        })
    },
    async getProjects(token){
        let res = await fetch("http://homlee.api/professional/getProjects",{
            method:"POST",
            headers:{
                Authorization:token,
            }
        })
        let json = await res.json()
        console.log(json);
        this.professionalProjects = json.data
    }

},
})