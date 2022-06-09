<template>
    <div class="container">
        <div class="product-edit-form">
            <div class="actions">
                <p>{{productToEdit.name}}</p>
                <div class="buttons">
                    <button @click="update">Edit</button>
                    <button >Delete</button>
                </div>
            </div>
            <div class="content">
                <div class="image-desc">
                    <div class="image">
                        <img :src="image || productToEdit.img" alt="" srcset="">
                    </div>
                    <div class="description">
                        <div class="input-grp">
                        <label for="">Description</label>
                        <textarea name="" id="" cols="30" rows="10" placeholder="Description" v-model="productToEdit.description" ></textarea>
                    </div>
                    </div>
                </div>
                <div class="form">
                    <div class="input-grp">
                        <label for="">Name of product</label>
                        <input type="text" placeholder="Name of product" v-model="productToEdit.name">
                    </div>
                    <div class="input-grp">
                        <label for="">Price</label>
                        <input type="number" placeholder="Price" v-model="productToEdit.price">
                    </div>
                    <div class="input-grp">
                        <label for="">Product Category</label>
                        <input type="text" placeholder="Product Category" v-model="productToEdit.category">
                    </div>
                    <div class="input-grp">
                        <label for="">Quantity</label>
                        <input type="number" placeholder="Quantity" v-model="productToEdit.quantity">
                    </div>
                    <div class="input-grp">
                        <label for="">Product Image</label>
                        <input type="text" placeholder="Product Image URL " v-model="image" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useRoute,useRouter } from 'vue-router'
import {onMounted,ref} from 'vue'
import { useStore } from "../../store/test"
import { Legend } from 'chart.js'


const route = useRoute()
const id = route.params.id
const productToEdit = ref('')
const image = ref('')
const store = useStore()





const getProduct = async()=>{
    const  res = await fetch(`http://homlee.api/products/findOneProduct/${id}`,{
        method:'POST'
    })
    const json = await res.json()
    productToEdit.value = json.data[0]
}


const update = async()=>{
    let res = await fetch('http://homlee.api/products/updateProduct',{
        method:'POST',
        body:JSON.stringify({
            id:id,
            name: productToEdit.value.name,
            price: productToEdit.value.price,
            category: productToEdit.value.category,
            quantity: productToEdit.value.quantity,
            img: image.value || productToEdit.value.img,
            description: productToEdit.value.description,
        })
    })
    let json = await res.json()
    console.log(json)
    store.listProducts.forEach(product => {
        if(product.id==id){
            product.name = productToEdit.value.name
            product.price = productToEdit.value.price
            product.category = productToEdit.value.category
            product.quantity =  productToEdit.value.quantity
            product.img = image.value || productToEdit.value.img
        }
            
    });
}



const Delete = ()=>{
    
}




getProduct()


</script>

<style lang="scss" scoped>
$or : #bea100;
.container{
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    .product-edit-form{
        width: 50%;
        height: 80%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        .actions{
            width: 100%;
            height: 12%;
            border: 1px solid;
            display: flex;
            justify-content: space-around;
            align-items: center;
            .buttons{
                width: 25%;
                display: flex;
                justify-content: space-between;
                button{
                    width: 100px;
                    height: 30px;
                    background-color: transparent;
                    border: 1px solid;
                    &:hover{
                        color: white;
                        border: none;
                        background-color: black;
                        cursor: pointer;
                    }
                }
            }
        }
        .content{
            width: 100%;
            height: 85%;
            display: flex;
            justify-content: space-between;
            .image-desc{
                width: 50%;
                height: 100%;
                display: flex;
                flex-direction: column;
                .image{
                    width: 100%;
                    height: 50%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    img{
                        width: 200px;
                    }

                }
                .description{
                    width: 100%;
                    height: 50%;
                    .input-grp{
                        width: 100%;
                        height: 90%;
                        display: flex;
                        flex-direction: column;
                        margin-bottom: 20px;
                        font-weight: bold;
                        textarea{
                            height: 40px;
                            height: 100%;
                            border:none;
                            border-bottom:2px solid;
                            padding:6px ;
                            font-size: 16px;
                            resize: none;
                        }
                        textarea:focus{
                            outline: none;  
                            border-bottom:2px solid $or;
                        }
                    }
                }
            }
            .form{
                width:50%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                align-items: center;
                .input-grp{
                    width: 90%;
                    height: 70px;
                    display: flex;
                    flex-direction: column;
                    margin-bottom: 20px;
                    font-weight: bold;
                    input{
                        height: 40px;
                        border:none;
                        border-bottom:2px solid;
                        padding:6px ;
                        font-size: 16px;
                    }
                    input:focus{
                        outline: none;  
                        border-bottom:2px solid $or;
                    }
                }
            }
        }
    }
}
@media screen and (max-width:500px) {
    .container{
        height: max-content;
        .product-edit-form{
            margin-top: 30px;
            width: 95%;
            .actions{
                p{
                    width: 70px;
                    overflow: hidden;
                }
                .buttons{
                    width: 46%;
                    height: 40px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    button{
                        width: 71px;
                    }
                }
            }
            .content{
                flex-direction: column;
                align-items: center;
                .image-desc{
                    width: 100%;
                }
                .form{
                    width: 100%;

                }
            }
        }
    }
}
</style>

