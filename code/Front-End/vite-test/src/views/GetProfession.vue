<template>
    <div class="super-container">
    <div class="search">
        <input
        type="text"
        placeholder="What service you need ? "
        v-model="search"
        />
        <button @click="searchFunction">Search</button>
    </div>
    <div class="container">
        <div
        class="profile"
        v-for="professional in professionalsList"
        :key="professional.id"
        >
        <div
        class="job-pic"
        style="
            background-image: url('https://st.hzcdn.com/fimgs/10f15b950bc72a76_9197-w368-h207-b0-p0---.jpg');
            "
        ></div>
        <div class="profile-desc">
            <div>
                <p><span>Professional Name :</span> {{ professional.name }}</p>
                <p>
                    <span>Professional category : </span>
                    {{ professional.professional_category }}
                </p>
                <p>
                    <span><img src="/assets/website.png" alt="" /></span>
                    <a href="">{{ professional.business_site }}</a>
                </p>
                <p>
                    <span><img src="/assets/phone.png" alt="" /></span>
                    {{ professional.phone_number }}
                </p>
                <p class="location">
                    <span><img src="/assets/location.png" alt="" /></span
                    >{{ professional.address }}
                </p>
            </div>
            <div class="button">
                <button>Send Message</button>
            </div>
        </div>
        </div>
    </div>
</div>
</template>

<script setup>
import { computed, onBeforeMount, onMounted, ref } from "vue";
import { useStore } from "../store/test.js";

const store = useStore();
console.log(store.listProfessionals)
const search = ref("");
const professionalsList = computed(() =>
    store.listProfessionals.filter((e) => {
        return e.professional_category.includes(search.value) 
    })
);


onBeforeMount(() => {});


</script>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,200&display=swap');
$or: #bea100;
.super-container {
    width: 70%;
    height: max-content;
.search {
    width: 100%;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    // background-color: crimson;
    input {
        width: 70%;
        height: 52px;
        border-radius: 0px;
        border: 1px solid;
        font-size: 18px;
        box-sizing: border-box;
        padding: 6px;
        &:focus {
            outline: none;
        }
    }
    button {
        background-color: black;
        border: none;
        width: 10%;
        height: 52px;
        font-size: 18px;
        font-weight: bold;
        color: white;
        &:hover {
            cursor: pointer;
        }
    }
}
.container {
    width: 100%;
    height: max-content;
    display: grid;
    grid-template-columns: 1fr;
    column-gap: 10px;
    row-gap: 10px;
    .profile {
        height: 300px;
        border-top: 1px solid gray;
        display: grid;
        grid-template-columns: 1fr 2fr;
        column-gap:30px;
        align-items: center;
        div {
            height: 90%;
        }
        .job-pic {
        background-size: cover;
        background-position: center;
        }
        .profile-desc {
            height: 90%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            div {
            p {
            margin: 5px;
            width: max-content;
            height: max-content;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            span {
                font-weight: bold;
                font-family: 'Roboto Flex', sans-serif;
                letter-spacing: 2px;
                img {
                    width: 20px;
                    height: 20px;
                    margin-right: 5px;
                    }
                }
                a {
                color: black;
                text-decoration: none;
                &:hover {
                    text-decoration: underline;
                    }
                }
            }
        }
        .button {
            display: flex;
            align-items: flex-end;
            button {
            width: 200px;
            height: 50px;
            font-size: 18px;
            color: white;
            background-color: rgba(0, 0, 0, 0.875);
            border: none;
            &:hover {
                cursor: pointer;
                background-color: rgba(0, 0, 0, 0.785);
                }
                    }
                }
            }
        }
    }
}
@media screen and (max-width:700px) {
    .super-container{
        width: 96%;
        justify-content: center;
        .search{
            input{
                width: 80%;
            }
            button{
                width: 20%;
            }
        }
        .container {
            justify-content: center;
        .profile{
            width: 100%;
            grid-template-columns: 1fr;
            .job-pic{
                display: none;
            }
            .profile-desc{
                width: 100%;
                div{
                    .location{
                    width: 100%;
                    }
                }
            }
        }
    }
    }
}
</style>
