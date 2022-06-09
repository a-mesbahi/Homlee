<script setup>
import { ref,watch } from 'vue'
import { useStore } from '../store/test'
import Cookies from 'js-cookie'

const store = useStore()

const alert = ref(false)

if(Cookies.get('id')){
  alert.value=true
}

setTimeout(() => {
  alert.value = false
},2000);


</script>

<template>
  <div class="container">
      <div class="alert" v-show="alert" data-aos="zoom-in">
        <div class="style"></div>        
        <h1>Welcome Amine ! </h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
    <div class="left">
      <div class="title">
        <h1>Get</h1>
        <div><p class="bold">Our </p> <h1> Services</h1></div>
      </div>
      <div class="pub" data-aos="fade-right"
          data-aos-offset="300"
          data-aos-easing="ease-in-sine">
        <div class="img-pub">
          <img src="https://storage.googleapis.com/studio-cms-assets/projects/YPqrevb8O5/s-1800x2400_v-frms_webp_93d80e28-ed91-4359-ace9-cdcd46c6bc4e_regular.webp" alt="">
        </div>
        <span class="flow">Design</span>
        <a href="">Interior design </a>
        <p class="flow">Interesting photo and interior decorations inspirations while <br> traveling in many cities of the world.</p>
      </div>

      <div class="pub" data-aos="fade-right"
        data-aos-offset="300"
        data-aos-easing="ease-in-sine">
        <div class="img-pub">
          <img src="https://images.pexels.com/photos/2183658/pexels-photo-2183658.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
        </div>
        <span class="flow">Design</span>
        <a href="">Interior design </a>
        <p class="flow">Interesting photo and interior decorations inspirations while <br> traveling in many cities of the world.</p>
      </div>
      
      <div class="pub" data-aos="fade-right"
          data-aos-offset="300"
          data-aos-easing="ease-in-sine">
        <div class="img-pub">
          <img src="https://images.pexels.com/photos/7873259/pexels-photo-7873259.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
        </div>
        <span class="flow">Design</span>
        <a href="">Interior design </a>
        <p class="flow">Interesting photo and interior decorations inspirations while <br> traveling in many cities of the world.</p>
      </div>
    </div>
    <div class="right">
      <div class="r-container">
          <div class="pub" data-aos="fade-left"
                  data-aos-offset="300"
                  data-aos-easing="ease-in-sine">
              <div class="img-pub">
                <img src="https://images.pexels.com/photos/4107120/pexels-photo-4107120.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
              </div>
              <span class="flow">Design</span>
              <a href="">Interior design </a>
              <p class="flow">Interesting photo and interior decorations inspirations while <br> traveling in many cities of the world.</p>
            </div>
            <div class="pub">
              <div class="img-pub" data-aos="fade-left"
                  data-aos-offset="300"
                  data-aos-easing="ease-in-sine">
                <img src="https://images.pexels.com/photos/3315286/pexels-photo-3315286.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
              </div>
              <span class="flow">Design</span>
              <a href="">Interior design </a>
              <p class="flow">Interesting photo and interior decorations inspirations while <br> traveling in many cities of the world.</p>
            </div>
            <div class="pub">
              <div class="img-pub" data-aos="fade-left"
                    data-aos-offset="300"
                    data-aos-easing="ease-in-sine">
                <img src="https://images.pexels.com/photos/5768031/pexels-photo-5768031.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
              </div>
              <span class="flow">Design</span>
              <a href="">Interior design </a>
              <p class="flow">Interesting photo and interior decorations inspirations while <br> traveling in many cities of the world.</p>
            </div>
      </div>
    </div>
  </div>
</template>

<style  lang="scss" scoped>
$or : #bea100;

.container{
  margin: auto;
  margin-top: 60px;
  width: 80%;
  height: max-content;
  display: flex;
  .alert{
    width: 32%;
    height: 150px;
    background-color: white;
    border: 2px solid;
    position: absolute;
    top: 60px;
    left: calc(50% - 300px);
    display: flex;
    flex-direction: column;
    align-items: center;    
    justify-content: space-evenly;
    .style{
      width: 10px;
      height: 10px;
      border-radius: 30px;
      background-color: black;
      position: absolute;
      top: 3px;
      right: 3px;
    }
  }
  
  .left{
    width: 50%;
    height: max-content;
    padding: 10px;
    box-sizing: border-box;
    border-right  : 1px solid rgb(195, 195, 195);
    .pub{
      margin:auto;
      margin-top: 20px;
      margin-bottom: 20px;
      height: 850px;
      width: 80%;
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      .flow{
        color:#868686;
      }
      a{
        color: #000000;
        font-size: 32px;
        font-weight: 700;
        letter-spacing: -0.03em;
        line-height: 1.2;
        margin: 0px 0px 0px 0px;
        text-align: left;
        justify-content: flex-start;
        text-decoration: none;
      }
      a:hover{
        color:$or;
      }
      .flow:hover{
        color:$or;
      }
      .img-pub{
        width: 500px;
        height: 600px;
          img{
            width: 100%;
            height: 100%;
          }
      }
      
    }
    .title{
      p{
        color: #000000;
        font-family: Poppins;
        font-size: 80px;
        font-weight: 700;
        height: auto;
        letter-spacing: -0.04em;
        line-height: 1;
        text-align: left;
        width: auto;
        max-width: 100%;
        justify-content: flex-start;
        margin-right: 10px;
      }
      h1{
        color: #000000;
        font-family: Poppins;
        font-size: 80px;
        font-weight: 300;
        height: auto;
        letter-spacing: -0.04em;
        line-height: 1;
        margin: 0px 0px 0px 0px;
        text-align: left;
        width: auto;
        max-width: 100%;
        justify-content: flex-start;
      }
      div{
        width: max-content;
        display: flex;
        .bold{
          font-weight: bold;
        }
      }
    }
  }
  .right{
    box-sizing: border-box;
    padding-top:20px;
    width: 50%;
    height: 70vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    .r-container{
        width: 100%;
            .pub{
                margin:auto;
                margin-top: 20px;
                margin-bottom: 20px;
                height: 850px;
                width: 80%;
                display: flex;
                flex-direction: column;
                justify-content: space-evenly;
                .flow{
                  color:#868686;
                }
                a{
                  color: #000000;
                  font-size: 32px;
                  font-weight: 700;
                  letter-spacing: -0.03em;
                  line-height: 1.2;
                  margin: 0px 0px 0px 0px;
                  text-align: left;
                  justify-content: flex-start;
                  text-decoration: none;
                }
                a:hover{
                  color:#bea100;
                }
                .flow:hover{
                  color:#bea100;
                }
                .img-pub{
                  width: 500px;
                  height: 600px;
                    img{
                      width: 100%;
                      height: 100%;
                    }
                }
            
          }
        }
  }
}
@media screen and (max-width:820px) {
    .container{
      margin: 0px;
      margin-top: 20px;
      flex-direction: column;
      align-content: center;
      .left{
        width: 100%;
        height: max-content;
        border: none;
        justify-content: center;
        padding: 0px;
        .title{
          p{
            font-size: 50px;
          }
          h1{
            font-size: 50px;
          }
        }
        .pub{
          width: 70%;
        .img-pub{
                width: 100%;
                height: 500px;
                  img{
                    width: 100%;
                    height: 100%;
                  }
          }
        }
      }
      .right{
        width: 100%;
        border: none;
        height: max-content;
        .r-container{
            .pub{
              width: 70%;
              .img-pub{
                  width: 100%;
                  height: 500px;
                    img{
                      width: 100%;
                      height: 100%;
                    }
                }
            }
        }
      }
    }
}

</style>
