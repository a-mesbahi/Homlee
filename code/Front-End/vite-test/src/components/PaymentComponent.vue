<template>
    <div class="container">
        <div class="SHIPPING" v-if="showShipping">
            <div class="delivery-type"  @click="DeliveryData">
                <img src="https://img.icons8.com/ios/50/000000/new-product.png"/>
                <div class="info-delivery">
                    <h3>HOME DELIVERY</h3>
                    <p class="date">Lundi 23 Mai - Jeudi 26 Mai</p>
                    <p class="price"> $ 5.9</p>
                </div>
            </div>
            <div class="delivery-type" @click="Payment">
                <img src="https://img.icons8.com/ios/50/000000/small-business.png"/>
                <div class="info-delivery">
                    <h3>DELIVERY IN STORE</h3>
                    <p class="date">Lundi 23 Mai - Jeudi 26 Mai</p>
                    <p class="price">Free</p>
                </div>
            </div>
        </div>
        <div class="payment" v-if="showPayment">
            <div class="carts">
                <div class="COD">
                    <img src="https://img.icons8.com/ios/50/000000/cash-on-delivery.png"/>
                    <p>COD</p>
                </div>
                <div class="visa">
                    <img src="https://img.icons8.com/ios/50/000000/visa.png"/>
                    <p>VISA</p>
                </div>
            </div>
        </div>


        <div class="delivery-infos" v-if="showDeliveryData">
            <p>DELIVERY DATA</p>
            <div class="form">
                <div class="input-grp">
                    <label for="">Address</label>
                    <input type="text" placeholder="Address" v-model="address">
                </div>
                <div class="input-grp">
                    <label for="">More information (optional) </label>
                    <input type="text" placeholder="More information" v-model="moreInfos">
                </div>
                <div class="input-grp">
                    <label for="">City</label>
                    <input type="text" placeholder="City" v-model="data.address">
                </div>
                <div class="input-grp">
                    <label for="">Market</label>
                    <input type="text" placeholder="Market" v-model="country">
                </div>
            </div>
            <button  @click="Payment">Continue</button>
        </div>

        <div class="paymentCart" v-if="showCartData">
            <p>CARD DATA</p>
            <div class="formContainer">
                <div class="input-grp">
                    <label for="">Card number</label>
                    <input type="text" placeholder="Card number" v-model="cardNumber">
                </div>
                <div class="input-grp">
                    <label for="">Card name</label>
                    <input type="text" placeholder="Card name" v-model="data.Card_name">
                </div>
                <div class="input-grp city">
                    <div>
                        <label for="">City</label>
                        <input type="text" placeholder="City" v-model="data.address">
                    </div>
                    <div>
                        <label for="">Market</label>
                        <input type="text" placeholder="Market" v-model="country">
                    </div>
                </div>
                <div class="input-grp">
                    <label for="">Code cvv </label>
                    <input type="text" placeholder="code cvv " >
                </div>
                <div class="input-grp">
                    <label for="">Quantity</label>
                    <input type="number" placeholder="Quantity" v-model="data.quantity">
                </div>
            </div>
            <button @click="complateOrder">confirm order</button>
        </div>

        <div class="total">
            <span>
                <h2>TOTAL</h2>
                <p>Taxes included</p>
            </span>
            <span>
                <h2>${{product.price}}</h2>
            </span>
        </div>
    </div>
    <PaymentComplated v-if="complate" @close="close" />
</template>

<script setup>
import {ref} from 'vue'
import Cookies from 'js-cookie'
import PaymentComplated from "./PaymentComplated.vue"

const complate = ref(false)

const close = ()=>{
    complate.value = false
    
}
const showShipping = ref(true)
const showPayment = ref(false)  
const showDeliveryData = ref(false)
const showCartData = ref(false)

const address = ref('')
const city = ref('')
const moreInfos = ref('')
const country = ref('Morocco')
const cardNumber = ref('')
const home = ref(false)

const props = defineProps({
    product:Object
})

const data = ref({
    product_id:props.product.id,
    address:'',
    Card_name:'',
    quantity:''
})

const DeliveryData = ()=>{
    showDeliveryData.value = true
    showShipping.value = false
    props.product.price+=5.9
    home.value = true
}

const Payment = ()=>{
    if(true){
        showCartData.value = true
        showShipping.value = false
        showDeliveryData.value=false
        if(home.value){
            data.value.address = data.value.address+' '+country.value+' '+address.value
        }
        if(!home.value){ 
            data.value.address = data.value.address+' '+'Store'
        }
    }else{
        console.log("nonono");
    }
}
const token = Cookies.get('token')
const complateOrder = async ()=>{
    let res = await fetch("http://homlee.api/client/addOrder",{
        method:"POST",
        body:JSON.stringify(data.value),
        headers:{
            Authorization:token
        }
    })
    let json = await res.json()   
    data.value.quantity ="" 
    data.value.Card_name ="" 
    data.value.address ="" 
    address.value ="" 
    cardNumber.value ="" 
    complate.value=true
}

</script>

<style lang="scss" scoped>
$or : #bea100;
.container{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    margin-top: 89px;
    .paymentCart{
        width: 100%;
        height: max-content;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        @media screen and (max-width:800px) {
            margin-bottom: 89px;
            height: max-content;
        }
        p{
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }
        button{
            display: flex;
            justify-content: center;
            align-items: center;
            align-self: flex-end;
            width: 200px;
            height:50px;
            background-color:black;
            border: none;
            color: white;
            font-size: 16px;
            letter-spacing: 1px;
            &:hover{
                cursor: pointer;
            }
        }

    }
    .delivery-infos{
        width: 100%;
        height: max-content;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        
        @media screen and (max-width:400px) {
            font-size: 13px;
        }
        p{
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }
        button{
            display: flex;
            justify-content: center;
            align-items: center;
            align-self: flex-end;
            width: 200px;
            height:50px;
            background-color:black;
            border: none;
            color: white;
            font-size: 16px;
            letter-spacing: 1px;
            &:hover{
                cursor: pointer;
            }
        }
    }
    .payment{
        width: 95%;
        height: 30%;
        display: flex;
        align-items: center;
        justify-content: center;
        .carts{
            width: 80%;
            height: 35%;
            display: grid;
            grid-template-columns: repeat(auto-fill,minmax(50%,50%));
            .COD{
                border:1px solid #eee ;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-around;
                img{
                    width: 40px;
                    transition: all .2s ease-in-out;
                    &:hover{
                        transform: scale(1.1);
                    }
                }
                p{
                    font-size: 18px;
                    letter-spacing: 1px ;
                    font-weight: 800;
                }
                &:hover{
                    cursor: pointer;
                    
                }
            }
            .visa{
                border:1px solid #eee ;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-around;
                border-left:none;
                p{
                    font-size: 18px;
                    font-weight: 800;
                    letter-spacing: 1px ;
                }
                img{
                    width: 40px;
                    transition: all .2s ease-in-out;
                    &:hover{
                        transform: scale(1.1);
                    }
                }
                &:hover{
                    cursor: pointer;
                }
            }
        }
    }
    .SHIPPING{
        width: 95%;
        height: 30%;
        display: grid;
        grid-template-columns: repeat(auto-fill,minmax(50%,1fr));
        .delivery-type{
            border: 1px solid #eee;
            box-sizing: border-box;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            .info-delivery{
                h3{
                letter-spacing: 1px;
                }
                .date{
                    font-size: 12px;
                    color: gray;
                }
                .price{
                    font-size: 14px;
                }
            }
            &:hover{
                border: 1px solid black ;
                cursor: pointer;
            }
        }
        
    }
    .total{
        width: 70%;
        height: 10%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        box-shadow: rgba(0, 0, 0, 0.15) 0px 3px 3px 0px;
        @media screen and (max-width:800px) {
            margin-top: 20px;
        }
        span{
            p{
                color: gray;
            }
        }
    }
}


</style>