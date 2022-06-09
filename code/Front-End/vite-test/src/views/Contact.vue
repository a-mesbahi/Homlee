<template>
    <div class="container">
        <div class="img">
        </div>
        <text>
            <aside>G</aside>et in <span> touch!</span>
        </text>
        <div class="contact-form">
            <div class="text">
                <h1>Contact form</h1>
                <p>Questions and comments are important to us, so please use the form below to contact our crew. We will reply as soon as possible.</p>
            </div>
            <div class="form">
                <div class="super-grp">
                    <div class="input-grp">
                        <label for="">Full Name</label>
                        <input type="text" placeholder="You Name">
                    </div>
                    <div class="input-grp">
                        <label for="">Your e-mail</label>
                        <input type="text" placeholder="E-mail">
                    </div>
                </div>
                <div class="textarea">
                    <label for="">Message</label>
                    <textarea type="text" placeholder="Message"></textarea>
                </div>
                <button>Send now</button>
            </div>
        </div>
        <div class="our-infos">
            <div>
                <img src="https://img.icons8.com/ios-glyphs/30/000000/new-post.png"/>
                <p>homlee@service.msb</p>
                <span>Send us a message and we will respond to your request as soon as possible.</span>
            </div>
            <div>
                <img src="https://img.icons8.com/ios-filled/50/000000/marker.png"/>
                <p>New York, Studio INC.</p>
                <span>We invite you to our stationary office in New York. We are planning our meeting today!</span>
            </div>
            <div>
                <img src="https://img.icons8.com/ios-glyphs/30/000000/phone--v1.png"/>
                <p>(212) 30-155355</p>
                <span>We work from Monday to Friday. Call our representative now! Call for Studio.</span>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
$or : #bea100;
.container{
    margin-top:30px ;
    width: 100%;
    height: max-content;
    display: flex;
    flex-direction: column;
    align-items: center;
    .img{
        width: 80%;
        height: 400px;
        background-image: url('https://images.unsplash.com/photo-1524439188326-e47322d1cef2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80');
        background-size: cover;
        background-position: center;
    }
    text{
        width: 80%;
        padding-top:30px ;
        font-size: 80px;
        aside{
            display: inline-block;
            border-bottom:5px solid ;
        }
        span{
            font-weight: 700;
            line-height: 1;
        }
    }
    .contact-form{
        margin-top: 30px;
        width: 80%;
        height: max-content;
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 10px;
        .text{
            display: flex;
            flex-direction: column;
            height: 500px;
            h1{
                font-weight: 700;
            }
            p{
                font-size: 15px;
                color: gray;
                width: 70%;
                text-align: justify;
            }
        }
        .form{
            width: 80%;
            height: max-content;
            display: flex;
            flex-direction: column;
            .super-grp{
                width: 95%;
                height: 100px;
                display: flex;
                justify-content: space-between;
                .input-grp{
                    width: 45%;
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
            .textarea{
                width:95%;
                height: max-content;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                font-weight: bold;
                textarea{
                    height: 300px;
                    border:none;
                    border-bottom:2px solid;
                    padding: 7px;
                    font-size: 16px;
                    display: flex;
                    resize: none;
                }
                textarea:focus{
                    outline: none;  
                    border-bottom:2px solid $or;
                }
            }
            button{
                width: 150px;
                height: 50px;
                border: none;
                background-color: black;
                color: white;
                margin-top: 20px;
            }
        }
    }
    .our-infos{
        margin-top: 100px;
        margin-bottom:30px;
        width: 80%;
        height: max-content;
        display: grid;
        grid-template-columns: repeat(auto-fill,minmax(400px,1fr));
        gap: 30px;
        div{
            height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            box-sizing: border-box;
            padding: 40px;
            p{
                font-weight: 900;
                color:black;
            }
            span{
                font-size: 14px;
                color: gray;
                width: 70%;
            }
            img{
                width: 30px;
                width: 30px;
            }
        }
        div:nth-child(2){
            border: 1px solid rgb(215, 215, 215);
        }
        
    }
}

@media screen and (max-width:500px) {
    .container{
        .contact-form{
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            .text{
                height: max-content;
                margin: 20px;
            }
            .form{
                width: 90%;
                .super-grp{
                    height: max-content;
                    width: 100%;
                    flex-direction: column;
                    .input-grp{
                        width: 100%;
                    }
                }
                .textarea{
                        width: 100%;
                }
            }
        }
    }
    .our-infos{
                width: 90%;
                margin: auto;
                div{
                    width: 300px;
                }
    }
}
</style>