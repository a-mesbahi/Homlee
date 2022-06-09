import { defineStore } from 'pinia'
import {ref} from 'vue'


export const useStore = defineStore('test',{
    state: () => ({
        id:1,
        listProducts:[],
        listProfessionals:[]
    }),


})