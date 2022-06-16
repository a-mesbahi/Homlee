<template>
    <div class="project-container">
        <div class="image">
            <div class="img" :style="{ backgroundImage: 'url(/assets/' +project.img+ ')' }"></div>
            <label for="firstImg" class="">
                Change the project image
            </label>
            <input type="file" id="firstImg" @change="getImg" accept="image/png, image/gif, image/jpeg">
        </div>
        <div class="grp">
            <label for="">Title : </label>
            <input type="text" v-model="project.title">
        </div>
        <div class="grp">
            <label for="">Date : </label>
            <input type="date" v-model="project.date">
        </div>
        <div class="grp">
            <label for="">Tags</label>
            <input type="text"  @keyup.enter="addTag" v-model="tag">
            <div class="tags">
                <span v-for="item in project.tags" :key="item" @click="remove(item.id)">
                    {{item.tag}}
                </span>
            </div>
        </div>
        <div class="grp">
            <label for="">Date : </label>
            <textarea name="" id="" cols="30" rows="10" v-model="project.description"></textarea>
        </div>
        <div class="action">
            <button @click="update">update</button>
            <p class="delete" @click="deleteProject">Delete Project</p>
        </div>
    </div>
    <UpdateDone element="project" data-aos="fade-left" v-if="pop" />
</template>

<script setup>
import { useRoute,useRouter } from 'vue-router'
import {ref,onMounted, onBeforeMount,computed} from "vue"
import { usePros } from "../../store/test"
import Cookies from 'js-cookie'
import UpdateDone from "../../components/UpdateDone.vue"


const pop = ref(false)

const store = usePros()
const route = useRoute()
const router = useRouter()
const project = ref('')
const tag = ref('')
const token = Cookies.get("tokenPro")
const id = route.params.id


const addTag = ()=>{
    if(tag.value.length>0){
        const obj = ref({
            id:project.value.tags.length,
            tag:tag.value
        })
        project.value.tags.push(obj.value)
        tag.value = ""
    }
}

const getImg = (e)=>{
    let file = e.target.files[0]
    project.value.img = file.name
}

const remove = (id)=>{
    for (let index = 0; index < project.value.tags.length; index++) {
        if (project.value.tags[index].id == id) {
            project.value.tags.splice(index,1);
        }
    }
}

const getSingleProject= async(id,token)=>{
        let res = await fetch(`http://homlee.api/professional/getSingleProjct/${id}`,{
            method:"POST",
            headers:{
                Authorization:token
            }
        })
        let json = await res.json()
        project.value = await json.data[0]
}


const update = async()=>{
    let res = await fetch('http://homlee.api/professional/updateProject',{
        method:'POST',
        body:JSON.stringify(project.value),
        headers:{
            Authorization:token
        }
    })
    let json = await res.json()
    console.log(json);
    store.professionalProjects.forEach(element=>{
        if(element.id == project.value.id){
            element.img = project.value.img
            element.tags = project.value.tags
            element.title = project.value.title
            element.description = project.value.description
            element.date = project.value.date
        }
    })
    pop.value = true
    setTimeout(() => {
    pop.value = false
    },2000);
}

const deleteProject = async()=>{
    let res = await fetch(`http://homlee.api/professional/deleteProject/${id}`,{
        method:"POST",
        headers:{
            Authorization:token
        }
    })
    let json = res.json()
    store.professionalProjects = store.professionalProjects.filter(e=>{
        return e.id!=project.value.id
    })
    router.push("/professional/profile")
}

getSingleProject(id,token)






</script>

<style lang="scss" scoped>
.project-container{
    color: black;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    .action{
        height: 70px;
        width: 90%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        .delete{
            color: rgba(255, 0, 0, 0.622);
        }
        button{
            border: 1px solid ;
            background-color: transparent;
            color: black;
            padding: 12px 30px;
            &:hover{
                cursor: pointer;
                background-color: black;
                color: white;
            }
        }
    }
    
    .image{
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 95%;
        .img{
            background-color: #eeee;
            width: 100%;
            height: 170px;
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
        }
        label{
            margin-top: 7px;
            color: rgba(0, 0, 252, 0.413);
            font-weight: 600;
            font-size: 14px;
        }
        input{
            display: none;
        }
    }
    .super-grp{
            display: flex;
            flex-direction: column;
            width: 90%;
            height: 200px;
            .grp{
                width: 100%;
                
            }
        }
        .grp{
            display: flex;
            flex-direction: column;
            height: max-content;
            color: black;
            margin-top: 20px;
            margin-bottom: 20px;
            width: 90%;
            input{
                height: 50px;
                border: 1px solid #eee;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }
            input:focus{
                    outline: none;  
            }
            label{
                font-weight: bold;
            }
            textarea{
                height: 140px;
                border: 1px solid #eee;
                resize: none;
                padding: 10px;
            }
            textarea:focus{
                    outline: none;  
            }
            .tags{
                width: 100%;
                min-height: 60px;
                height: max-content;
                display: flex;
                flex-wrap: wrap;
                span{
                    width: max-content;
                    padding: 6px;
                    border: 1px solid;
                    margin: 10px;
                    &:hover{
                        cursor: pointer;
                    }
                }
            }
        }
}
</style>