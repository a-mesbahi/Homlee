import { defineStore } from 'pinia'
import {ref} from 'vue'
import { useRouter } from 'vue-router'
import Cookies from 'js-cookie'


export const useStore = defineStore('test',{
    state: () => ({
        // id:1,
        listProducts:[],
        listProfessionals:[],
        professionalInfos:null,
    })
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
        this.professionalData = await json.data
        if(!this.professionalData.error){
            Cookies.set('idPros',this.professionalData.id)
        }
    },
    async addProject(dataForm){
        let res = await fetch("http://homlee.api/professional/addProject",{
            method:"POST",
            body:JSON.stringify(dataForm)
        })
        this.professionalProjects.push(dataForm)
    },
    async editProfile(){
        let res = await fetch("http://homlee.api/professional/editProfile",{
            method:"POST",
            body:JSON.stringify(this.professionalData)
        })
    },
    async getProf(id){
        let res = await fetch(`http://homlee.api/professional/getOnePro/${id}`,{
            method:"POST"
        })
        let json = await res.json()
        this.professionalData = json.data[0]
    },
    async changePassword(passwordData){
        let res = await fetch("http://homlee.api/professional/changePassword",{
            method:"POST",
            body:JSON.stringify(passwordData)
        })
    },
    async getProjects(id){
        let res = await fetch(`http://homlee.api/professional/getProjects/${id}`)
        let json = await res.json()
        this.professionalProjects = json.data
    }

},
})