<script setup>
import { ref,computed} from 'vue'
import {useStore} from '../store/test'
import Cookies from 'js-cookie'

const notLogin = computed(()=>{
    if(Cookies.get('id')){
        return false
    }else{
        return true
    }

})
const login = computed(()=>{
    if(Cookies.get('id')){
        return true
    }else{
        return false
    }
})

const logOut = ()=>{
    Cookies.remove('id')

}

const store = useStore()
const menuShow = ref(false)
const showTheMenu = ()=>{
    menuShow.value = !menuShow.value
}
</script>

<template>
    <div class="nav-container">
        <nav>
            <div class="super-logo">
                <div class="logo">
                    <h1>Homlee</h1>
                </div>
            </div>
            <div class="menu" @click="showTheMenu">
                <span></span>
                <span></span>
            </div>  
        </nav>
        <ul class="nav-plus" >
            <li><router-link to="/GET_IDEAS_">GET IDEAS</router-link></li>
            <li><router-link to="/GET_PROFESSION_">FIND PROFESSIONALS</router-link></li>
            <li><router-link to="/Products">SHOP BY DEPARTMENT</router-link></li>
            <li><router-link to="/pros">FOR PROS</router-link></li>
        </ul>
        <transition name="fade">
            <div class="menu-show" v-if="menuShow">
                <nav>
                    <div class="super-logo">
                        <p>Homlee</p>
                    </div>
                    <div class="menu" @click="showTheMenu">
                        <span></span>
                        <span></span>
                    </div>
                </nav>
                <div class="menu-show-body">
                    <div class="menu-list">
                        <ul>
                            <li><router-link to="/dashboard/login">Our Admin</router-link></li>
                            <li><a href="">About</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                            <li><router-link to="/login_prof">For our Profs ! </router-link></li>
                            <li v-if="notLogin"><a href="/login">Login / signup </a></li>
                            <li v-if="login" @click="logOut"><router-link to="/">Logout</router-link></li>
                        </ul>
                    </div>
                    <div class="menu-deco">
                        <h1>Homlee</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error consequuntur aperiam porro dolorem, nihil accusantium sint libero reiciendis, voluptates omnis dolor saepe qui adipisci? Hic voluptate dolores autem tenetur magnam.</p>
                    </div>
                </div>
                <div class="menu-show-underside">
                    <div>
                        <p>Follow us</p>
                        <ul >
                            <li><a href="">Facebook</a></li>
                            <li><a href="">Twitter</a></li>
                            <li><a href="">Linkedin</a></li>
                            <li><a href="">Dribbble</a></li>
                        </ul>
                    </div>
                        <p>© Copyright 2022 Homlee . Designed by Mesbahi.</p>
                    </div>
            </div>
        </transition>
            
    </div>
</template>




<style scoped lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,200&display=swap');
$or: #bea100;
.fade-enter-active, .fade-leave-active {
    transition: opacity .8s;
}
.fade-enter, .fade-leave-to {
    opacity: 0;
}
.nav-container{
    .menu-show{
    border-top: 3px solid $or;
    z-index: 999;
    position: fixed ;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: black;    
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    .menu-show-body{
        width: 80%;
        height: 70vh;
        margin: auto;
        display: flex;
        justify-content: space-between;
        .menu-list{
            width: 30%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            ul{
                li{
                    list-style: none;
                    a{
                        text-decoration: none;
                        color: #7d7d7df8;
                        font-family: Poppins;
                        font-size: 50px;
                        font-weight: 300;
                        letter-spacing: -0.04em;
                        line-height: 1.3;
                        transition-duration: 1000ms;
                    }
                    a:hover{
                        color: white;
                    }
                }
            }
        }
        .menu-deco{
            width: 60%;
            height: 90%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: rgba(189, 189, 189, 0.973);
            p{
                width: 50%;
                text-align: justify;

            }
        }
    }
    .menu-show-underside{
        width: 80%;
        height:12vh;
        margin: auto;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        font-size: 14px;
        p{
            color:#a9a9a9;
        }
        div{
            display: flex;
            width: 400px;
            p{
                width: 100px;
            }
            ul{
                width: 300px;
                list-style: none;
                display: flex;
                justify-content: space-around;
                a{
                    text-decoration: none;
                    color: white;
                    font-weight: bold;
                }
                a:hover{
                    color:$or;
                }
            }
        }
    }
    .super-logo{
            display: flex;
            align-items: flex-end;
            p{
                color: white;
                font-family: 'Roboto Flex', sans-serif;
                font-size: 15px;
                font-style: normal;
                font-weight: 700;
                height: auto;
                letter-spacing: 0.35em;
                line-height: 2;
                text-align: center;
                width: auto;
                max-width: 100%;
                justify-content: center;
                margin-left: 3px;
                margin-bottom: 6px;
            }
            .logo-withe{
                width: 60px;
                height: 60px;
                border-radius: 70px;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color:transparent;
            }
        }
        .menu{
                span{
                    background-color: white;
                }
                span:nth-child(1){
                    transform:rotateZ(53deg);
                }
                span:nth-child(2){
                    transform: rotateZ(53deg);
                }
        }
        .menu:hover{
            span{
                background-color: #bea100;
            }    
        }

    }
    width: 100%;
    height: max-content;
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
    nav{
    width: 80%;
    height: 70px;
    margin: auto;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    // background-color: crimson;   
        .super-logo{
            display: flex;
            align-items: flex-end;
            .logo{
                width: 150px;
                height: 100px;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color:transparent;
                margin-top: 10px;
            img{
                width: 100%;
                height:100%;
            }
            }
        }
        .menu{
            width: 40px;
            height: 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            span{
                width: 30px;
                height: 2px;
                background-color: black;
            }
        }
        .menu:hover{
                cursor: pointer;
        }
    }
    .nav-plus{
        width:50%;
        height: 40px;
        // background-color: chartreuse;
        display: flex;
        align-items: center;
        justify-content: space-around;  
        margin: auto;
        list-style: none;
        border-bottom: 1px solid rgb(167, 167, 167);
        li{
            a{
                text-decoration: none;
                color: black;
            }
        }
    }
}
@media screen and (max-width:820px) {
    .nav-container{
        nav{
            width: 93%;
        }
        .nav-plus{
            width: 90%;
            font-size: 10px;
        }
    }
}


</style>
