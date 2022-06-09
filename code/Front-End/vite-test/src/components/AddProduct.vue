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
            <div class="double-input-grp">
                <div class="input-grp">
                <label for="">Name of product</label>
                    <input type="text" placeholder="Name of product" v-model="formData.name">
                </div>
                <div class="input-grp">
                    <label for="">Price </label>
                    <input type="number" placeholder="Price" v-model="formData.price">
                </div>
            </div>
            <div class="double-input-grp">
                <div class="input-grp">
                <label for="">Product Category</label>
                    <input list="category" type="text" placeholder="Product category" v-model="formData.category">
                    <datalist id="category">
                        <option value="hello"></option>
                        <option value="bay"></option>
                    </datalist>
                </div>
                <div class="input-grp">
                    <label for="">Quantity </label>
                    <input type="number" placeholder="Quantity" v-model="formData.quantity">
                </div>
            </div>
            <div class="img-input">
                <label for="">Product Image</label>
                <input  type="text" placeholder="Product image" v-model="formData.img">
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
        height: 106vh;
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
                .input-grp{
                    input[type=number]::-webkit-inner-spin-button {
                        -webkit-appearance: none;
                        opacity: 1;
                        }
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
            }
            .img-input{
                width: 90%;
                margin: auto;
                margin-top: 30px;
                display: flex;
                flex-direction: column;
                font-size: 18px;
                font-weight: bold;
                justify-content: center;
                input{
                    border: none;
                    border-bottom: 2px solid;
                    width: 70%;
                    height: 30px;
                    padding: 7px;
                    font-size: 16px;
                    &:focus{
                        outline: none;  
                        border-bottom:2px solid $or;
                    }
                }
            }
            .double-input-grp{
                margin-top: 30px;
                width: 100%;
                height: 100px;
                display: flex;
                justify-content: space-around;

            }
            button{
                font-weight: bold;
                width: 180px;
                height: 50px;
                background-color: transparent;
                color: black;
                margin-top: 40px;
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