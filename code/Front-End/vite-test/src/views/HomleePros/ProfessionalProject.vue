<template>
    <div class="container">
        <div class="project" v-for="i in 20" :key="i">
            <h2>project Title</h2>
            <p class="date">Date : 02-22-2022</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, fuga?..</p>
            <div class="img" style="background-image:url('https://images.pexels.com/photos/372796/pexels-photo-372796.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);'">
            </div>
            <div class="tags">
                <div class="tag">Plumbing</div>
                <div class="tag">test</div>
                <div class="tag">tools</div>
                <div class="tag">home</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
.container
{
    width: 100%;
    height: 93vh;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(400px,1fr));
    gap: 20px;
    overflow: auto;
    box-sizing: border-box;
    padding: 10px;
    .container::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }
    .container::-webkit-scrollbar
    {
        width: 10px;
        background-color: #F5F5F5;
    }
    .container::-webkit-scrollbar-thumb
    {
        background-color: black;
        
        background-image: -webkit-gradient(linear, 0 0, 0 100%,
                        color-stop(.5, rgba(255, 255, 255, .2)),
                        color-stop(.5, transparent), to(transparent));  
    }
    .project
    {
        color: black;
        height: 380px;
        border: 1px solid #eee;
        box-sizing: border-box;
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        p{
            font-size: 14px;
            font-weight: 550;
        }
        h2{
            letter-spacing: 1px ;
            height: 45px;
        }
        .date{
            color: rgb(188, 188, 188);
            height: 30px;
        }
        .img{
            width: 95%;
            height: 150px;
            background-position:center;
            background-size: cover;
            background-repeat: no-repeat;
            margin: auto;
        }
        .tags{
            width: 90%;
            height: 50px;
            display: flex;
            justify-content: space-around;
            margin: auto;
            .tag{
                width: max-content;
                height: max-content;
                padding: 6px;
                padding-left: 12px;
                padding-right: 12px;
                background-color: rgba(0, 0, 0, 0.896);
                color: white;
                border-radius:30px ;
            }
        }
    }
}
</style>