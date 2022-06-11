<template>
<div class="addForm-container" @click.self="close"> 
    <div class="add-form">
        <form action="" @submit.prevent="AddNewProduct">
            <div class="top">
                <h1>Product</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem itaque nulla reiciendis. Iusto ut delectus neque esse atque quia nihil sed fugit eligendi. Deserunt voluptatum quisquam voluptates asperiores. Consequuntur, tempore.</p>
                <div class="product-info">
                    <div class="price">
                        <h4>Product Price</h4>
                        <p v-if="!formData.price">Price Of Product</p>
                        <p v-else>${{formData.price}}</p>
                    </div>
                    <div class="name">
                        <h4>Product Name</h4>
                        <p v-if="!formData.name">Name Of Product</p>
                        <p v-else>{{formData.name}}</p>
                    </div>
                    <div class="name">
                        <h4>Product Category</h4>
                        <p v-if="!formData.category">Category Of Product</p>
                        <p v-else>{{formData.category}}</p>
                    </div>
                    <div class="name">
                        <h4>Quantity</h4>
                        <p v-if="!formData.quantity">Quantity Of Product</p>
                        <p v-else>{{formData.quantity}}</p>
                    </div>

                </div>
            </div>
            <div class="form">
                <div class="twoInputs">
                    <div class="input">
                        <FormKit
                        type="text"
                        label="Name of product"
                        validation="required|text"
                        validation-visibility="live"
                        placeholder="Enter the name of the product."
                        v-model="formData.name"
                        />
                    </div>
                    <div class="input">
                        <FormKit
                        type="number"
                        label="Price of product"
                        validation="required|number"
                        validation-visibility="live"
                        placeholder="Price "
                        v-model="formData.price"
                        />
                    </div>
                </div>
                <div class="twoInputs">
                    <div class="input">
                        <FormKit
                            type="select"
                            label="Product category"
                            placeholder="Select a category"
                            :options="[
                                'Furniture',
                                'Outdoor',
                                'Rugs & Decor',
                                'Lighting',
                                'Bath',
                                'Bath',
                                'Home Decor',
                                'Kitchen & Tabletop',
                                'Living',
                                'Storage & Organization',
                            ]"
                            validation="required"
                            v-model="formData.category"
                        />
                    </div>
                    <div class="input">
                        <FormKit
                        type="number"
                        label="Quantity of product"
                        validation="required|number"
                        validation-visibility="live"
                        placeholder="Quantity"
                        v-model="formData.quantity"
                        />
                    </div>
                </div>
                <div class="twoInputs">
                    <div class="input">
                        <FormKit
                        type="text"
                        label="Image of product"
                        validation="required|text"
                        validation-visibility="live"
                        v-model="formData.img"
                        placeholder="Enter the image of product."
                        />
                    </div>
                    <div class="input">
                        <FormKit
                        type="textarea"
                        label="Your Essay"
                        rows="08"
                        validation="required|text"
                        placeholder="Remember to write in complete sentences."
                        v-model="formData.description"
                        />
                    </div>
                </div>
            </div>
            <button >Add the product</button>
        </form>
    </div>
</div>

</template>

<script setup>
import {ref} from 'vue'
import { useStore } from "../store/test.js"


const store = useStore()


const emit = defineEmits(['newProduct'])
const close = ()=>{
    emit("newProduct")
}


const formData = ref({
    id:'',
    name:'',
    price:'',
    category:'',
    quantity:'',
    img:'',
    description:'',
    status:'Available',
    sales:0,
})


const AddNewProduct = async()=>{
    let res = await fetch('http://homlee.api/products/saveProduct',{
        method:'POST',
        body:JSON.stringify(formData.value)
    })
    let json = await res.json()
    formData.value.id = json.id
    store.listProducts.push(formData.value)
    close()
    formData.value = {
        id:'',
        name:'',
        price:'',
        category:'',
        quantity:'',
        img:'',
        status:'Available',
        sales:0,
    }
}
</script>

<style lang="scss" scoped>
$or : #bea100;
.addForm-container{
        position:absolute;
        width: 100%;
        min-height: 106vh;
        background-color: rgba(0, 0, 0, 0.204);
        display: flex;
        justify-content: center;
        align-items: center;
        .add-form{
            margin-top:50px ;
            width: 45%;
            height:90%;
            background-color: white;
            z-index: 1000;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            align-self: center;
            form{
                width: 100%;
                height: 100%;
                .top{
                    width: 97.5%;
                    height: 35%;
                    background-color: rgba(220, 220, 220, 0.437);
                    padding: 10px;
                    
                }
                .product-info{
                    margin: auto;
                    margin-top: 30px;
                    padding: 10px;
                    width: 90%;
                    height: 40%;
                    border-top:1px solid rgba(168, 168, 168, 0.753) ;
                    border-bottom:1px dashed rgba(168, 168, 168, 0.753) ;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-evenly;
                    .price,.name{
                        width: 100%;
                        display: flex;
                        justify-content: space-between;
                        color: gray;
                        p{
                            width: 45%;
                        }
                    }
                }
                .form{
                    width: 90%;
                    min-height: 450px;
                    margin: auto;
                    display: flex;
                    flex-direction: column;
                    margin-top: 6px;
                    .twoInputs{
                        width: 100%;
                        min-height: 100px;
                        display: flex;
                        .input{
                            width: 50%;
                            min-height: 100px;                  
                            // border: 1px solid;
                        }
                    }
                }
            }
            
            button{
                font-weight: bold;
                width: 180px;
                height: 50px;
                background-color: transparent;
                color: black;
                margin-top: 30px;
                margin-bottom: 15px;
                border: 2px solid ;
                margin-left:37% ;
                font-size: 15px;
                &:hover{
                    cursor: pointer;
                    background-color: black;
                    color: white;
                }
            }
        }
}




</style>