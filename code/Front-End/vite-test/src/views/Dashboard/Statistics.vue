<template>
    <div class="statistics">
        <div class="top-side">
            <h1>Add to gallery</h1>
        </div>
        <div class="underside">
            <div class="infos">
                <figure class="image-block" v-for="i in 3" :key="i">
                    <h1>Lorem ipsum dolor sit amet consectetur.</h1>
                    <img src="https://images.pexels.com/photos/3049121/pexels-photo-3049121.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" />
                    <figcaption>
                        <h3>
                            More Info
                        </h3>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                        <button>
                            More Info
                        </button>
                    </figcaption>
                </figure>
                <div class="Add-section">
                    <img src="https://img.icons8.com/external-dreamstale-lineal-dreamstale/64/000000/external-add-ui-dreamstale-lineal-dreamstale.png"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup >
import Courbe from "../../components/Courbe.vue"

</script>

<style scoped lang="scss">


$base-duration: 500ms;

// Colors


.statistics{
    width: 100%;
    height: 100vh;
    .top-side{
        width: 100%;
        height: 10vh;
        display: flex;
        align-items: center;
        box-sizing: border-box;
        padding-left: 20px;
    }
    .underside{
        width: 100%;
        height: 90vh;
        .infos{
            width: 100%;
            height: max-content;
            display: grid;
            grid-template-columns: repeat(4,minmax(400px,1fr));
            align-items: center;
            column-gap: 10px;
            row-gap: 7px;
            justify-content: space-around;
            box-sizing: border-box;
            padding: 20px;
            figure {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 400px;
                height: 690px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                overflow: hidden;
                &:hover {
                    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                    img {
                        transform: scale(1.25);
                    }
                    figcaption {
                        bottom: 0;
                    }
                }
                p{
                    width: 90%;
                }
                h1 {
                    position: absolute;
                    top: 50px;
                    left: 20px;
                    margin: 0;
                    padding: 0;
                    color: white;
                    font-size: 20px;
                    font-weight: 100;
                    line-height: 1;
                }
                img {
                    height: 100%;
                    transition: 0.25s;
                }
                figcaption {
                    position: absolute;
                    bottom: -33%;
                    left: 0;
                    width: 100%;
                    //height: 50%;
                    margin: 0;
                    padding: 30px;
                    background-color: rgba(black,0.85);
                    box-shadow: 0 0 20px rgba(black,0.4);
                    color: white;
                    line-height: 1;
                    transition: 0.25s;
                    h3 {
                        margin: 0 0 20px;
                        padding: 0;
                    }
                    p {
                        font-size: 14px;
                        line-height: 1.75;
                    }
                    button {
                        position: relative;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 10px 0 0;
                        padding: 10px 30px;
                        background-color: transparent;
                        border: 1px solid white;
                        color: white;
                        font-size: 14px;
                        &:hover{
                            cursor: pointer;
                            background-color:white ;
                            color: black;
                        }
                    }
                }
            }

            .Add-section{
                height: 690px;
                border: 2px dashed gray;
                background-color:transparent;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 48px;
                &:hover{
                    cursor: pointer;
                }
            }
        }
    }
}
</style>