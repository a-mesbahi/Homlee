<template>
    <div class="projects-container">
        <div class="project" >
            <div class="img">
                <h4>Homlee</h4>
                <div class="content" :style="{ backgroundImage: 'url(/assets/plumbing.jpg)' }">
                </div>
            </div>
            <div class="project-infos">
                <section>
                    <h1>ARCHI STUDIO</h1>
                    <p>BUSINESS PROJECT FOR CLIENTS</p>
                </section>
                <section>
                    <p>The function object type has a constructor: Function.
                    When Function is invoked as a constructor new Function(arg1, arg2, ..., argN, bodyString), a new function is created. The arguments arg1, args2, ...,argN passed to constructor become the parameter names for the new function and the last argument bodyString is used as the function body code.</p>
                    <span>Date : 08-11-2002</span>
                </section>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Amiri:ital@1&family=Ubuntu&display=swap');
.projects-container{
    width: 80%;
    height: max-content;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 60px;
    .project{
        width: 80%;
        height: 500px;
        border: 1px solid rgba(189, 189, 189, 0.933);
        margin-bottom: 10px;
        margin-top: 10px;
        position: relative;
        display: flex;
        @media screen and (max-width:800px) {
            flex-direction: column;
            width: 100%;
            height: 100%;
        }
        h4{
            position: absolute;
            top: 10px;
            left: 7px;
            font-family: 'Ubuntu', sans-serif;
            letter-spacing: 3px ;
        }
        .img{
            width: 50%;
            height: 100%;
            border-right: 1px solid;
            display: flex;
            justify-content: center;
            align-items: center;
            @media screen and (max-width:800px) {
                width: 100%;
                height: 300px;
                border: 0px;
            }
            .content{
                width: 80%;
                height: 80%;
                border-top-left-radius: 100px;
                background-position: center;
                background-size: cover;
            }
        }
        .project-infos{
            width: 50%;
            height: 100%;
            scroll-snap-type: y mandatory;
            overflow-y: scroll;
            @media screen and (max-width:800px) {
                width: 100%;
                height: max-content;
            }
            &::-webkit-scrollbar {
                display: none;
            }
            section{
                flex: none;
                width: 100%;
                height: 100%;
                scroll-snap-align:  start;
                &:nth-of-type(1){
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-end;
                    box-sizing: border-box;
                    padding-left: 10px;
                    h1{
                        font-size: 40px;
                        letter-spacing: 2px;
                    }
                    p{
                        font-size: 30px;
                        letter-spacing: 2px;
                    }
                }
                &:nth-of-type(2)
                {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    box-sizing: border-box;
                    padding: 30px;
                    text-align: justify;
                    font-size: 18px;
                    font-weight: 600;
                    position: relative;
                    span{
                        position: absolute;
                        top: 7px;
                        right: 7px;
                        font-size: 14px;
                        font-weight: lighter;
                        color: rgba(198, 198, 198, 0.933);
                    }
                }
            }
        }
    }
}
</style>