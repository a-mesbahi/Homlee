
<script setup>

</script>



<template>
    <footer>
        <div class="footer-topside">
            <div class="text-tl">
                <p class="contact-text">Contact</p>
                <p class="now-text">now!</p>
            </div>
                <a href="#" class="contact-link">contact</a>
        </div>
        <div class="footer-underside">
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
    </footer>
</template>


<style lang="scss" scoped>
$or : #bea100;
footer{
    padding: 20px;
    margin: auto;
    margin-top: 80px;
    width:70%;
    height: 300px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    border-top: 1px solid rgb(209, 209, 209);
    .footer-underside{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        width: 50%;
        height: 70px;
        font-size: 14px;
        p{
            color:#868686;
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
                    color: #000000;
                    font-weight: bold;
                }
                a:hover{
                    color:$or;
                }
            }
        }
    }
    .footer-topside{
        height: 138px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        .contact-link{
            font-size: 24px;
            font-weight: 700;
            border-bottom: 3px solid rgb(94, 93, 93);
            width: 33px;
            text-decoration: none;
            color: #000000;
        }
    }
    .text-tl{
        display: flex;
        .contact-text{
            color: #000000;
            font-size: 80px;
            font-weight: bolder;
            height: auto;
            letter-spacing: -0.04em;
            line-height: 1;
            text-align: left;
        }
        .now-text{
            color: #000000;
            font-family: Poppins;
            font-size: 80px;
            font-weight: 500;
            height: auto;
            letter-spacing: -0.04em;
            line-height: 1;
            margin: 0px 0px 0px 15px;
            text-align: left;
            width: auto;
            max-width: calc(100% - 15px);
            justify-content: flex-start;
        }
        
    }
}
@media screen and(max-width:820px) {
    footer{
        width:90%;
        height: max-content;
        padding: 0px;
        padding-top: 20px;
        margin-bottom: 20px;
        .footer-topside{
            height: max-content;
            padding-left:0px ;
            margin-bottom: 10px;
            .text-tl{
                display: flex;
                flex-direction: column;
                .contact-text{
                    font-size: 50px;
                }
                .now-text{
                    font-size: 50px;
                    margin: 0px;
                }
            }
        }
        .footer-underside{
            margin-top: 10px;
            height: 200px;
            width: 80%;
            div{
                width: 100%;
                height: 126px;
                display: flex;
                flex-direction: column;
                flex-direction: column;
                justify-content: space-between;
                ul{
                    flex-direction: column;
                }
            }
        }
    }

}
</style>