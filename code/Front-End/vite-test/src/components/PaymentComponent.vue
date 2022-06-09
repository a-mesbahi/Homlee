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
            <div class="delivery-type">
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
                    <div>
                        <label for="">City</label>
                        <input type="text" placeholder="City" v-model="city">
                    </div>
                    <div>
                        <label for="">Market</label>
                        <input type="text" placeholder="Market" v-model="country">
                    </div>
                </div>
            </div>
            <button  @click="Payment">Continue</button>
        </div>

        <div class="paymentCart" v-if="showCartData">
            <p>CARD DATA</p>
            <div class="form">
                <div class="input-grp">
                    <label for="">Card number</label>
                    <input type="text" placeholder="Card number" v-model="data.cardNumber">
                </div>
                <div class="input-grp">
                    <label for="">Card name</label>
                    <input type="text" placeholder="Card name">
                </div>
                <div class="input-grp">
                    <div>
                        <label for="">City</label>
                        <input type="text" placeholder="City" v-model="city">
                    </div>
                    <div>
                        <label for="">Market</label>
                        <input type="text" placeholder="Market" v-model="country">
                    </div>
                    <div>
                        <label for="">Code cvv </label>
                        <input type="text" placeholder="code cvv " >
                    </div>
                    <div>
                        <label for="">Quantity</label>
                        <input type="number" placeholder="Quantity" >
                    </div>
                </div>
            </div>
            <button>confirm order</button>
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
</template>

<script setup>
import {ref} from 'vue'
import Cookies from 'js-cookie'

const showShipping = ref(true)
const showPayment = ref(false)  
const showDeliveryData = ref(false)
const showCartData = ref(false)
const address = ref('')
const city = ref('')
const moreInfos = ref('')
const country = ref('Morocco')

const props = defineProps({
    product:Object
})

const data = ref({
    product_id:props.product.id,
    address:'',
    client_id:Cookies.get('id'),
    order_date:'',
    cardName:'',
    quantity:''
})

const DeliveryData = ()=>{
    showDeliveryData.value = true
    showShipping.value = false
    props.product.price+=5.9
}

const Payment = ()=>{
    if(country.value ){
        showDeliveryData.value = false
        showCartData.value = true
        data.value.location = country.value+' '+city.value+' '+address.value
    }
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
    .paymentCart{
        width: 100%;
        height: 40%;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
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
        .form{
            width: 100%;
            height:90%;
            display: grid;
            grid-template-columns: repeat(auto-fill,minmax(50%,1fr));
            .input-grp{
                height:80px;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                label{
                    font-weight: bold;
                }
                input{
                    width: 90%;
                    height: 40px;
                    border:none;
                    border-bottom:2px solid;
                    padding:6px ;
                    font-size: 16px;
                    background-color: rgba(247, 247, 247, 0.883);
                }
                input:focus{
                outline: none;  
                border-bottom:2px solid $or;
                }
            }
            .input-grp:last-child{
                display: grid;
                grid-template-columns: repeat(auto-fill,minmax(22%,1fr));
                gap: 20px;
            }
            
        }

    }
    .delivery-infos{
        width: 100%;
        height: 40%;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
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
        .form{
            width: 100%;
            height:80%;
            display: grid;
            grid-template-columns: repeat(auto-fill,minmax(50%,1fr));
            .input-grp{
                height:80px;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                label{
                    font-weight: bold;
                }
                input{
                    width: 95%;
                    height: 40px;
                    border:none;
                    border-bottom:2px solid;
                    padding:6px ;
                    font-size: 16px;
                    background-color: rgba(247, 247, 247, 0.883);
                }
                input:focus{
                outline: none;  
                border-bottom:2px solid $or;
                }
            }
            .input-grp:last-child{
                display: grid;
                grid-template-columns: repeat(auto-fill,minmax(40%,1fr));
                gap: 20px;
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
        span{
            p{
                color: gray;
            }
        }
    }
}


</style>