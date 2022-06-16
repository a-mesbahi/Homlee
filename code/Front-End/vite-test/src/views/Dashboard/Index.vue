<template>
    <div class="dashboard-container">
        <div class="dashboard-menu">
            <div class="logo">
                <p>Homlee</p>
            </div>
            <ul class="links">
                <li>
                    <router-link to="/dashboard" >
                        <img src="https://img.icons8.com/ios/50/000000/home-page.png"/>
                        <p>Home</p>
                    </router-link>
                </li>
                <li>
                    <router-link to="/dashboard/products">
                        <img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-sales-miscellaneous-kiranshastry-lineal-kiranshastry.png"/>
                        <p>Products</p>
                    </router-link>
                </li>

                <li>
                    <router-link to="/dashboard/Professionals">
                        <img src="https://img.icons8.com/ios/50/000000/search-client.png"/>
                        <p>Professionals</p>
                    </router-link>
                </li>

                <li>
                    <router-link to="/dashboard/sales">
                        <img src="https://img.icons8.com/ios-glyphs/30/000000/sales-performance.png"/>
                        <p>Sales</p>
                    </router-link>
                </li>

                <li>
                    <a @click="logOut">
                        <img src="https://img.icons8.com/ios/50/000000/exit.png"/>
                        <p>Log out</p>
                    </a>
                </li>
                
            </ul>
        </div>
        <div class="dashboard-content">
            <router-view/>
        </div>
        
    </div>
</template>

<script setup >
import {onMounted} from "vue"
import Cookies from 'js-cookie'
import {useRouter} from "vue-router"
import { useStore } from '../../store/test.js' 

const store = useStore()
const router = useRouter()

const logOut = ()=>{
    Cookies.remove('tokenAdmin')
    router.push('/')
}
onMounted(()=>{
    if(!Cookies.get('tokenAdmin')){
        router.push('/dashboard/login')
    }
    store.getProducts()
})
</script>

<style scoped lang="scss">
.dashboard-container{
    width: 100vw;
    height: max-content;
    display: flex;
    .dashboard-menu{
        width: 10%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
        .logo{
            margin: 20px 0px 30px 0px;
            p{
                
                font-size: 15px;
                font-style: normal;
                font-weight: 500;
                letter-spacing: 0.35em;
                line-height: 2;
                text-align: center;
                justify-content: center;
            }
        }
        .links{
            list-style: none;
            margin-top: 220px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            width: 100%;
            height: 400px;
            li{
                width: 100%;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                a{
                    display: flex;
                    align-items: center;
                    width: 90%;
                    height: 100%;
                    display: flex;
                    align-items: center;
                    text-decoration: none;
                    font-weight: bold;
                    font-size: 18px;
                    color: black;
                    img{
                        height:25px;
                        margin-right: 4px;
                    }
                    p{
                        height:18px;
                        font-size: 16px;
                    }
                }
            }
            
        }
        button{
            width: 100%;
            height: 60px;
            background-color: transparent;
            display: flex;
        }
    }
    .dashboard-content{
        min-width: 90%;
        height: 100vh;
    }
    .active{
        border-left: 1px solid;
    }
}

@media screen and(max-width:1039px) {
    body{
        min-height: 100%;
        .dashboard-container{
            flex-direction: column-reverse;
            justify-content: space-between;
            height: max-content;
            position: relative;
            .dashboard-menu{
                margin-top: 20px;
                display: flex;
                flex-direction: row;
                height: max-content;
                width: 100%;
                box-sizing: border-box;
                padding: 10px;
                position: sticky;
                z-index: 999;
                bottom: 0;
                background-color: white;
                border-top:1px solid rgb(211, 211, 211) ;
                .logo{
                    display: none;
                }
                .links{
                    display: flex;
                    flex-direction: row;
                    height: max-content;
                    width: 100%;
                    margin: 0px;
                    li{
                        width: auto;
                        a{
                            p{
                                display: none;
                            }
                        }
                    }
                }
            }
            .dashboard-content{
                height: max-content;
            }
        }
    }
}
</style>