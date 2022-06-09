<template>
    <div class="popUp-container">
        <div class="popUp">
            <img src="/public/assets/good.png" alt="" srcset="">
            <h4>your profile has been modified</h4>
        </div>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
.popUp-container{
    width: 100%;
    height:100vh;
    background-color:transparent;
    position:fixed;
    top: 0;
    left: 0;
    z-index: 100;
    display: flex;
    justify-content: flex-end;
    box-sizing: border-box;
    padding-top: 20px;
    .popUp{
        width:20%;
        height:80px;
        background-color: white;
        border: 1px solid;
        border-right:none ;
        display: flex;
        align-items: center;
        color: black;
        img{
            width: 60px;
            margin-right: 10px  ;
        }
    }
}
</style>