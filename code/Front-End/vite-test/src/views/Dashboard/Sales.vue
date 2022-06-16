<template>
    <div class="container">
        <div class="header">
            <h1>Orders</h1>
            <p>{{orders.length}} Orders found</p>
        </div>
        <div class="content">
            <div class="order" v-for="item in orders" :key="item.id">
                <div class="top">
                    <div >
                        <h3>{{item.clientName}}</h3>
                        <span>{{item.orderAddress}}</span>
                    </div>
                    <div>
                        <h3>Product category : </h3>
                        <p>{{item.product_category}}</p>
                    </div>
                    <div>
                        <h3>date of order : </h3>
                        <p>{{item.order_date}}</p>
                    </div>
                </div>
                <div class="bottom">
                    <img :src="item.img" alt="" srcset="">
                    <div class="buttons">
                        <h4>{{item.product_name}}</h4>
                        <div class="checkbox">
                            <input type="checkbox" @change="complateOrder(item.id)">
                            If the order completed
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script setup>
import {ref,onMounted} from "vue"
import Cookies from 'js-cookie'

const orders = ref([])
const getOrders = async ()=>{
    let res = await fetch('http://homlee.api/admin/getOrders')
    let json = await res.json()
    orders.value = json.data
    console.log(json.data)
}

const complateOrder = async(id)=>{
    orders.value = orders.value.filter(order=>{
        return order.id!=id
    })
    let res = await fetch(`http://homlee.api/admin/complateOrder/${id}`,{
        method:"POST",
        headers:{
            Authorization:Cookies.get("tokenAdmin"),
        }
    })
    let json = await res.json()
}


onMounted(()=>{
    getOrders()
})





</script>

<style lang="scss" scoped>
.container{
    width: 100%;
    height: 100%;
    .header{
        width: 100%;
        height: 120px;
        box-sizing: border-box;
        padding: 20px;
    }
    .content{
        margin: auto;
        width: 95%;
        height: 77.6vh;
        display: grid;
        grid-template-columns: repeat(auto-fill,minmax(600px,1fr));
        gap: 30px;
        overflow: auto;
        box-sizing: border-box;
        padding: 10px;
        @media screen and (max-width:500px) {
            overflow: initial;
            height: max-content;
            flex-direction: column;
            align-items: center;
        }
        .order{
            height: 300px;
            box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
            border: 1px solid rgb(213, 213, 213);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            @media screen and (max-width:500px) {
                    height: max-content;
                    width: 300px;
                }
            .top{
                height: 50%;
                width: 90%;
                border-bottom: 1px solid rgb(209, 209, 209);
                display: grid;
                grid-template-columns: repeat(3,1fr);
                @media screen and (max-width:500px) {
                    display: flex;
                    height: max-content;
                    flex-direction: column;
                }
                div{
                    padding: 20px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    height:max-content;
                    
                }
            }
            .bottom{
                width: 90%;
                height: 50%;
                display: flex;
                justify-content: space-around;
                align-items: center;
                @media screen and (max-width:500px) {
                    display: flex;
                    height: max-content;
                    flex-direction: column;
                    align-items: flex-start;
                }
                img{
                    width: 10%;
                    @media screen and (max-width:500px) {
                        margin-top: 30px;
                        margin-bottom: 30px;
                        width: 45%;
                    }
                }
                .buttons{
                    width: 40%;
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-around;
                    
                    @media screen and (max-width:500px) {
                        width: 100%;
                        margin-bottom: 10px;
                    }
                    

                }
            }
        }
    }
    .content::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    .content::-webkit-scrollbar
    {
        width: 10px;
        background-color: #F5F5F5;
    }

    .content::-webkit-scrollbar-thumb
    {
        background-color: black;
        
        background-image: -webkit-gradient(linear, 0 0, 0 100%,
                        color-stop(.5, rgba(255, 255, 255, .2)),
                        color-stop(.5, transparent), to(transparent));  
    }
    
}
</style>
