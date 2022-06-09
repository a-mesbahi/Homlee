<template>
    <div class="container">
        <div class="container-infos">
        </div>
        <div class="content">
            <div class="profile-info">
                <img src="https://avatars.dicebear.com/api/croodles/amijea.svg" alt="" srcset="" id="img">
                <div class="professional-infos">
                    <h1>Amine Mesbahi</h1>
                    <h3>Plumbing</h3>
                    <p>Little plumbing</p>
                    <span>
                        <img src="/assets/location.png" alt="">
                        <p>Maroc ,Casablanca 42°B 54°N</p>
                    </span>
                </div>
                <div class="media">
                    <img src="https://img.icons8.com/ios/50/000000/twitter--v1.png"/>
                    <img src="https://img.icons8.com/ios/50/000000/instagram-new--v1.png"/>
                    <img src="https://img.icons8.com/ios/50/000000/facebook-new.png"/>
                </div>
                <div class="websiteLink">
                    <img src="/assets/website.png" alt="" srcset="">
                    <a href="">Little plumbing</a>
                </div>
                <div class="date">
                        Member since Nov 15, 2021
                </div>
            </div>
            <div class="profile-content">
                <div class="barre-menu">
                    <ul>
                        <li><router-link to="/professional/profile"> My projects </router-link></li>|
                        <li><router-link to="/professional/profile/edit"> Edit profile </router-link></li>
                    </ul>
                    <ul>
                        <li><router-link to="/professional/profile/AddProject"> Add project </router-link></li>|
                        <li><router-link to="/professional/profile/edit"> Log out </router-link></li>
                    </ul>
                </div>
                <div class="content">
                    <router-view/>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
.container{
    width: 100%;
    .container-infos{
        color: white;
        width: 100%;
        height: 300px;
        background-color: #2d3436;
        background-image: linear-gradient(315deg, #2d3436 0%, #000000ab 74%);
    }
    .content{
        width: 100%;
        height: max-content;
        display: flex;
        justify-content: space-around;
        .profile-info{
            width: 350px;
            height: 700px;
            margin-top: -200px;
            background-color: white;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            h3{
                letter-spacing: 1px;
            }
            #img{
                width: 200px;
            }
            .professional-infos{
                width: 300px;
                height: 200px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-evenly;
                color: rgb(105, 105, 105);
                
                h1{
                    color: black;
                    font-weight: normal;
                }
                span{
                    display: flex;
                    color: black;
                }
            }
            .media{
                width: 50%;
                display: flex;
                justify-content: space-around;
                img{
                    width: 30px;
                }
            }
            .websiteLink{
                width: 45%;
                height:40px;
                display: flex;
                justify-content: space-around;
                align-items: center;
                color: black;
                a{
                    text-decoration: none;
                    color: black;
                }
            }
            .date{
                width: 80%;
                height: 20%;
                border-top: 1px solid #eee;
                color: rgb(188, 188, 188); 
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }
        .profile-content{
            width: 70%;
            height: max-content;
            color: #eee;
            .barre-menu{
                width: 100%;
                height: 70px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-sizing: border-box;
                padding-left: 10px;
                padding-right: 10px;
                a{
                    text-decoration: none;
                    color: black;
                }
                ul{
                    width: 15%;
                    display: flex;
                    justify-content: space-between;
                    list-style: none;
                }
            }
            .content{
                width: 100%;
                height: max-content;
            }
        }
    }
}
@media screen and (max-width:900px) {
    .container{
        .container-infos{
            display: none;
        }
        .content{
            display: flex;
            flex-direction: column;
            align-items: center;
            .profile-info{
                display: flex;
                flex-direction: row;
                position: relative;
                width: 100%;
                margin: 0px;
                height: max-content;
                box-sizing: border-box;
                padding: 10px;
                .date,.websiteLink,.media{
                    display: none;
                }
            }

            .profile-content{
                width: 97%;
                .barre-menu{
                    ul{
                        width: 41%;
                    }
                }
            }
        }
    }
}
</style>
