<template>
    <div class="container">
        <div class="form-container">
            <div class="img-upload">
            <label for="firstImg" class="">
                <img src="https://img.icons8.com/ios/50/undefined/upload-to-cloud--v1.png"/>
                Import Your Projects Picture
            </label>
            <input type="file" id="firstImg" @change="getImg" accept="image/png, image/gif, image/jpeg">
        </div>
        <div class="super-grp">
            <div class="grp">
            <label for="">Project title</label>
            <input type="text" placeholder="Project title " v-model="dataForm.title">
        </div>
        <div class="grp">
            <label for="">Date : </label>
            <input type="date" v-model="dataForm.date">
        </div>
        </div>
        <div class="grp">
            <label for="">Tags</label>
            <input type="text"  @keyup.enter="addTag" v-model="tag">
            <div class="tags">
                <span v-for="item in tagsArray" :key="item" @click="remove(item.id)">
                    {{item.tag }}
                </span>
            </div>
        </div>
        <div class="grp">
            <label for="">Description : </label>
            <textarea name="" id="" cols="30" rows="10" v-model="dataForm.description">

            </textarea>
        </div>
        <button @click="saveProject">Save Project</button>
        </div>
    </div>
</template>

<script setup>
import {ref,reactive} from "vue"
import Cookies from 'js-cookie'
import { usePros } from "../../store/test"

const store = usePros()


const dataForm = ref({
    idProfessional:Cookies.get('idPros'),
    img:"",
    title:"",
    tags:[],
    date:"",
    description:"",
})

const tag = ref('')
const tagsArray = reactive([])

const getImg = (e)=>{
    let file = e.target.files[0]
    dataForm.value.img = file.name
}

const addTag = ()=>{
    if(tag.value.length>0){
        const obj = ref({
            id:tagsArray.length,
            tag:tag.value
        })
        tagsArray.push(obj.value)
        tag.value = ""
    }
}

const remove = (id)=>{
    for (let index = 0; index < tagsArray.length; index++) {
        if (tagsArray[index].id == id) {
            tagsArray.splice(index,1);
        }
    }
}


const saveProject = async()=>{
    dataForm.value.tags = tagsArray
    store.addProject(dataForm.value)
    dataForm.value.img = ""
    dataForm.value.tags = []
    dataForm.value.date = ""
    dataForm.value.description = ""


    // let res = await fetch("http://homlee.api/professional/addProject",{
    //     method:"POST",
    //     body:JSON.stringify(dataForm.value)
    // })
    // let json = await res.json()
    // console.log(json);

}






</script>











<style lang="scss" scoped>
.container{
    width: 100%;
    height: 93vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    .form-container{
        width: 100%;
        height: max-content;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        margin-bottom: 100px;
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
        .img-upload{
            border: 2px dashed #eee;
            width: 70%;
            height: 200px;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
            label{
                color: black;
                text-decoration: underline;
                display: flex;
                align-items: center;
                justify-content: center;
                &:hover{
                    cursor: pointer;
                }
                img{
                    width: 30px;
                    height: 30px;
                    margin-right: 4px;
                }
            }
            input{
                display: none;
                box-sizing: border-box;
                padding: 10px;
            }
            
        }
        button{
            width: 100px;
            height: 50px;
            background-color: black;
            color: white;
            border: 1px solid ;
            &:hover{
                cursor: pointer;
            }
        }
    }
}
</style>