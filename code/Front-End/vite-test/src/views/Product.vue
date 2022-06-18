<template>
    <div class="container">
        <div class="img">
            <img :src="product.img"/>
            
        </div>
        <div class="product-info-shop" >
            <Payment v-if="payment" :product="product"/>
            <div class="presentation-of-product" v-if="showDescription">
                <span class="name-category">
                    <p>{{product.category}}</p>
                    <h3>{{product.name}}</h3>
                </span>
                <span class="description">
                    <p>{{product.description}}</p>
                </span>
                <span class="price">
                    <p>${{product.price}}</p>
                </span>
                <button @click="goToPayment">Buy now</button>
                <span class="features">
                    <p>Pick up in store — Free</p>
                    <p>Available</p>
                </span>
                <span class="features">
                    <p>Home delivery or pick-up point — From €3.90</p>
                    <p>Available</p>
                </span>
            </div>
            
        </div>
    </div>
</template>

<script setup>
import Payment from "../components/PaymentComponent.vue"
import { useRoute,useRouter } from 'vue-router'
import {onMounted,ref} from 'vue'
import Cookies from 'js-cookie'


const route = useRoute()
const router  = useRouter()
const id = route.params.id
const product = ref('')

const payment = ref(false)
const showDescription = ref(true)

const goToPayment = ()=>{
    payment.value = !payment.value
    showDescription.value = !showDescription.value
}



const getProduct = async()=>{
    const  res = await fetch(`http://homlee.api/products/findOneProduct/${id}`)
    const json = await res.json()
    product.value = json.data[0]
}

onMounted(()=>{
    if(!Cookies.get('token')){
        router.push('/login')
    }
    getProduct()
})





</script>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,200&display=swap');

.container{
    width: 100%;
    height: 800px;
    display: flex;
    justify-content: space-around;
    position: relative;
    .img{
        width: 45%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        h3{
            font-family: 'Roboto Flex', sans-serif;
            letter-spacing: 3px;
        }
        img{
            width: 60%;
            @media screen and(max-width:500px) {
                width: 200px;
            }
        }
    }
    .product-info-shop{
        width: 45%;
        height: 100%;
        display: flex;
        align-items: center;
        @media screen and (max-width:800px) {
            width: 93%;
        }
        .presentation-of-product{
            width: 100%;
            height: 50%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            @media screen and (max-width:800px) {
                height: 81vh;
            }
            .name-category{
                p{
                    color: gray;
                }
                h3{
                    font-size: 24px;
                    font-weight: normal;
                }
            }
            .description{
                color: gray;
            }
            button{
                width: 180px;
                height: 40px;
                background-color: black;
                color: white;
                border: none;
                &:hover{
                    cursor: pointer;
                }
            }
            .price{
                font-size: 20px;
                letter-spacing: 1px;
            }
            .features{
                p:last-child{
                    color: green;
                    letter-spacing: 1px;
                }
            }
        }
    }

}

@media screen and (max-width:820px) {
    .container{
        width: 100%;
        height: max-content;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
    }
}


</style>