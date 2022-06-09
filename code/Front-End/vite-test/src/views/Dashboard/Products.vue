<script setup>
import {ref,computed} from 'vue'
import { useStore } from "../../store/test"
import AddProduct from "../../components/AddProduct.vue"


const store = useStore()

const productsList = computed(()=>
    store.listProducts
    )


const toggleFilterMenu = ()=>{
        filterMenu.value = !filterMenu.value
}
const filterMenu = ref(false)

const AddProductForm = ref(false)

const newProduct = ()=>{
    AddProductForm.value = !AddProductForm.value
}





</script>






<template>
    <div class="product-container">
        
            <AddProduct @newProduct="newProduct" v-show="AddProductForm"/>  
        <div class="header">
            <div class="left">
                <h1>Products</h1>
                <span>There are {{productsList.length}} total products</span>
            </div>
            <div class="right">
                <div @click="toggleFilterMenu" class="filter" ref="filter">
                    <span>Filter by status </span>
                    <img src="https://img.icons8.com/ios-glyphs/30/000000/expand-arrow--v1.png"/>
                    <ul v-if="filterMenu" class="filter-menu">
                        <li>Lorem ipsum.</li>
                        <li>Lorem ipsum.</li>
                        <li>Lorem ipsum.</li>
                        <li>Lorem ipsum.</li>
                    </ul>
                </div>
                <div @click="newProduct" class="button">
                    <div class="inner-button">
                        <img src="/assets/add.png" alt="">
                    </div>
                    <span>New Product</span>
                </div>
            </div>
        </div>
        <div class="definition-container">
            <div class="definitions">
                <div class="product-info"><h4>Product</h4></div>
                <div class="product-price"><h4>Price</h4></div>
                <div class="product-status"><h4>Status</h4></div>
                <div class="product-sell"><h4>Sell</h4></div>
                <div class="product-quantity"><h4>Quantity</h4></div>
            </div>
        </div>
        <div class="body">
            <router-link :to="{ name: 'DashboardSingleProduct', params: { id: product.id } }" tag="div" class="product" v-for="product in productsList" :key="product.id">
                <div class="product-info">
                    <img :src="product.img" alt="">
                    <p>{{ product.name }}</p>
                </div>
                <div class="product-price"><h3>${{ product.price }}</h3></div>
                <div class="product-status"><h3>{{ product.status }}</h3></div>
                <div class="product-sell"><h3>{{ product.sales }}</h3></div>
                <div class="product-quantity"><h3>{{ product.quantity }}</h3></div>
            </router-link>
        </div>
        
    </div>

</template>

























<style scoped lang="scss">
$or : #bea100;
.product-container{
    box-sizing: border-box;
    padding-top:10px ;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    
    .header{
        margin: auto;
        width: 70%;
        height: 70px;
        display: flex;
        justify-content: space-between;
        .left{
            font-weight: bold;
        }
        .right{
            width: 400px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            .filter{
                width: 145px;
                height: 100%;
                display: flex;
                justify-content: space-around;
                align-items: center;
                position: relative;
                span:hover{
                    cursor: pointer;
                }
                img{
                    width:15px;
                }
                .filter-menu{
                    background-color:white;
                    box-sizing: border-box;
                    padding: 6px;
                    position: absolute;
                    top: 47px;
                    width: 100%;
                    height: 150px;
                    border: 1px solid rgb(153, 153, 153);
                    // border-radius: 5px;
                    list-style: none;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: space-around;
                    li:hover{
                        cursor: pointer;
                        color: $or;
                    }
                }
            }
            
            .button{
                width: 135px;
                height: 47px;
                font-weight: bold;
                padding: 10px;
                border-radius: 70px;
                background-color: black;
                font-size: 14px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                color: white;
                img{
                    width: 38px;
                }
                &:hover{
                    cursor: pointer;
                }
            }
            
        }
    }
    .definition-container{
        width: 60%;
        height: 50px;
        margin: auto;
        margin-top:30px ;
        .definitions{
            margin: auto;
            width: 80%;
            height: 100%;
            display:grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            column-gap: 10px;
            .product-price,.product-status,.product-sell,.product-info,.product-quantity{
                display: flex;
                align-items: center;
                // justify-content: center;
            }
        }
    }
    .body{
        margin: auto;
        width: 60%;
        height: 700px;
        display: grid;
        grid-template-columns: 1fr;
        row-gap:20px ;
        overflow: auto;
        justify-items: center;
        .product{
            color: #000;
            width: 80%;
            height: 120px;
            border: 1px solid rgb(173, 173, 173);
            display:grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            column-gap: 10px;
            text-decoration: none;
            // div{
            //     // background-color: crimson;
            // }
            .product-price,.product-status,.product-sell,.product-quantity{
                display: flex;
                align-items: center;
                // justify-content: center;
            }
            .product-info{
                width: 140px;
                height: 100%;
                display: flex;  
                flex-direction: column;
                align-items: center;
                justify-content: center;
                img{
                width: 70px;
                height: 70px;
                }
                p{
                    font-size: 14px;
                    width: 100px;
                    white-space: nowrap; 
                    overflow: hidden;
                    text-overflow: ellipsis;
                }
            }
            
        }
    }
    .body::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    .body::-webkit-scrollbar
    {
        width: 10px;
        background-color: #F5F5F5;
    }

    .body::-webkit-scrollbar-thumb
    {
        background-color: black;
        
        background-image: -webkit-gradient(linear, 0 0, 0 100%,
                        color-stop(.5, rgba(255, 255, 255, .2)),
                        color-stop(.5, transparent), to(transparent));  
    }
    

}





</style>