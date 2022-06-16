<template>
  <div class="product-container">
    <div class="submenu">
      <a href="">Furniture</a>
      <a href="">Outdoor</a>
      <a href="">Rugs &amp; Decor</a>
      <a href="">Lighting</a>
      <a href="">Bath</a>
      <a href="">Home Improvement</a>
      <a href="">Kitchen &amp; Tabletop</a>
    </div>
    <div class="pub-container_with_landing-nav-list">
      <div class="shop-landing__rail-nav-list">
        <p class="shop-landing__rail-nav-list_title">Shop by Department</p>
        <ul>
          <li><a href="">Furniture</a></li>
          <li><a href="">Outdoor</a></li>
          <li><a href="">Rugs &amp; Decor</a></li>
          <li><a href="">Lighting</a></li>
          <li><a href="">Bath</a></li>
          <li><a href="">Home Decor</a></li>
          <li><a href="">Kitchen &amp; Tabletop</a></li>
          <li><a href="">Living</a></li>
          <li><a href="">Storage &amp; Organization</a></li>
        </ul>
      </div>
      <div class="homlee_shop_img">
        <img
          src="https://st.hzcdn.com/fimgs/2931429c001966fd_7634-w900-h250-b0-p0--.jpg"
          alt=""
        />
      </div>
    </div>
    <div class="shop-landing__department-links-container">
      <div v-for="product in staticListProducts" :key="product.name">
        <div class="img">
          <a href="">{{ product.name }}</a>
          <img :src="product.img" alt="" />
        </div>
        <div class="links-list">
          <ul>
            <li v-for="link in product.elements" :key="link">
              <a href="">{{ link }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="shop-landing__card-image-wrapper">
      <p class="title">INTERESTED IN <span>OUR SERVICES ?</span></p>
      <p>
        Contact us for a budget simulation and for any questions about our
        services. We will respond to you with precision as soon as possible.
      </p>
      <button>Make a demand</button>
    </div>
    <div class="Shop_Bestsellers">
      <h2>Shop Bestsellers</h2>
      <div class="Bestsellers-products">
        <div class="products" v-for="item in bestProducts" :key="item">
          <img
            :src="item.img"
            alt=""
            srcset=""
          />
          <a href="">{{item.name}}</a>
          <p>${{item.price}}</p>
        </div>
      </div>
      <img src="/assets/arrow.png" id="arrow" />
    </div>
    <div class="recommendedProducts">
      <h2>Recommended Products</h2>
      <div class="products">
        <router-link
          :to="{ name: 'Product', params: { id: product.id } }"
          tag="div"
          class="product"
          v-for="product in productsList"
          :key="product.id"
        >
          <div :style="{ backgroundImage: `url(${product.img})` }"></div>
          <p class="name">{{ product.name }}</p>
          <p class="category">{{ product.category }}</p>
          <p class="price">${{ product.price }}</p>
        </router-link>
      </div>
    </div>
    <div class="ad">
      <!-- <router-link :to="{ name: 'product'}" tag="div" > -->
      <img :src="`/assets/${ad}`" alt="ad" />
      <!-- </router-link> -->
    </div>
  </div>
</template>

<script setup>
import { computed, onMounted, ref } from "vue";
import { useStore } from "../store/test.js";

const store = useStore();

const staticListProducts = [
  {
    img: "https://www.houzz.com/jpics/20220429122539/mp-landing/shop-landing-12491.jpg",
    name: "Furniture",
    elements: [
      "Living Room Furniture",
      "Kitchen & Dining Furniture",
      "Bedroom Furniture",
      "Home Office Furniture",
      "Outdoor Furniture",
      "Bathroom Storage & Vanities",
      "Shop All Furniture",
    ],
    link: "Shop All Furniture",
  },
  {
    img: "https://www.houzz.com/jpics/20220429122539/mp-landing/shop-landing-12501.jpg",
    name: "Kitchen & Dining ",
    elements: [
      "Kitchen & Dining Furniture",
      "Kitchen Fixtures",
      "Bar Stools & Counter Stools",
      "Kitchen Storage & Organization",
      "Tabletop",
      "Cookware & Bakeware",
      "Shop All Kitchen & Dining",
    ],
    link: "Shop All Furniture",
  },
  {
    img: "https://www.houzz.com/jpics/20220429122539/mp-landing/shop-landing-468.jpg",
    name: "Bath",
    elements: [
      "Living Room Furniture",
      "Kitchen & Dining Furniture",
      "Outdoor Furniture",
      "Bathroom Storage & Vanities",
    ],
    link: "Shop All Furniture",
  },
  {
    img: "https://www.houzz.com/jpics/20220429122539/mp-landing/shop-landing-579.jpg",
    name: "Lighting",
    elements: [
      "Living Room Furniture",
      "Kitchen & Dining Furniture",
      "Outdoor Furniture",
      "Bathroom Storage & Vanities",
    ],
    link: "Shop All Furniture",
  },
  {
    img: "https://www.houzz.com/jpics/20220429122539/mp-landing/shop-landing-516.jpg",
    name: "Living",
    elements: [
      "Living Room Furniture",
      "Kitchen & Dining Furniture",
      "Outdoor Furniture",
      "Bathroom Storage & Vanities",
    ],
    link: "Shop All Furniture",
  },
  {
    img: "https://www.houzz.com/jpics/20220429122539/mp-landing/shop-landing-538.jpg",
    name: "Bedroom",
    elements: [
      "Living Room Furniture",
      "Kitchen & Dining Furniture",
      "Outdoor Furniture",
      "Bathroom Storage & Vanities",
    ],
    link: "Shop All Furniture",
  },
  {
    img: "https://www.houzz.com/jpics/20220429122539/mp-landing/shop-landing-489.jpg",
    name: "Home Decor",
    elements: [
      "Living Room Furniture",
      "Kitchen & Dining Furniture",
      "Outdoor Furniture",
      "Bathroom Storage & Vanities",
    ],
    link: "Shop All Furniture",
  },
  {
    img: "https://www.houzz.com/jpics/20220429122539/mp-landing/shop-landing-639.jpg",
    name: "Outdoor",
    elements: [
      "Living Room Furniture",
      "Kitchen & Dining Furniture",
      "Outdoor Furniture",
      "Bathroom Storage & Vanities",
    ],
    link: "Shop All Furniture",
  },
  {
    img: "https://www.houzz.com/jpics/20220429122539/mp-landing/shop-landing-629.jpg",
    name: "Storage & Organization",
    elements: [
      "Living Room Furniture",
      "Kitchen & Dining Furniture",
      "Outdoor Furniture",
      "Bathroom Storage & Vanities",
    ],
    link: "Shop All Furniture",
  },
  {
    img: "https://www.houzz.com/jpics/20220429122539/mp-landing/shop-landing-12509.jpg",
    name: "Home Improvement",
    elements: [
      "Living Room Furniture",
      "Kitchen & Dining Furniture",
      "Outdoor Furniture",
      "Bathroom Storage & Vanities",
    ],
    link: "Shop All Furniture",
  },
  {
    img: "https://www.houzz.com/jpics/20220429122539/mp-landing/shop-landing-514.jpg",
    name: "Holiday Decor",
    elements: [
      "Living Room Furniture",
      "Kitchen & Dining Furniture",
      "Outdoor Furniture",
      "Bathroom Storage & Vanities",
    ],
    link: "Shop All Furniture",
  },
  {
    img: "https://www.houzz.com/jpics/20220429122539/mp-landing/shop-landing-sale.jpg",
    name: "SALE",
    elements: [
      "Living Room Furniture",
      "Kitchen & Dining Furniture",
      "Outdoor Furniture",
      "Bathroom Storage & Vanities",
    ],
    link: "Shop All Furniture",
  },
];

const ad = ref("");
const image = ref("");
const getAd = async () => {
  const res = await fetch("http://homlee.api/admin/getAds");
  const json = await res.json();

  ad.value = json.data.img;
};

const productsList = computed(() => store.listProducts);

const bestProducts = ref([])


const getBestProducts = async()=>{
  let res = await fetch("http://homlee.api/products/getBestsProducts")
  let json = await res.json()
  bestProducts.value = json.data
}


onMounted(() => {
  getAd()
  getBestProducts()
});

</script>












<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,200&display=swap");
$or: #bea100;
.product-container {
  width: 100%;
  height: max-content;
  display: flex;
  flex-direction: column;
  align-items: center;
  .submenu {
    width: 100%;
    height: 40px;
    border: 1px solid #eee;
    display: flex;
    justify-content: space-around;
    align-items: center;
    box-sizing: border-box;
    padding: 0px 280px;
    font-size: 14px;
    a {
      text-decoration: none;
      color: black;
    }
  }
  .pub-container_with_landing-nav-list {
    margin-top: 20px;
    width: 70%;
    height: 300px;
    display: flex;
    .homlee_shop_img {
      width: 70%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      img {
        width: 80%;
      }
    }
    .shop-landing__rail-nav-list {
      width: 30%;
      height: 100%;
      ul {
        list-style: none;
        a {
          text-decoration: none;
          color: black;
        }
      }
    }
    .shop-landing__rail-nav-list_title {
      border-bottom: 1px solid rgb(227, 227, 227);
      margin-bottom: 3px;
    }
  }
  .shop-landing__department-links-container {
    width: 70%;
    height: max-content;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
    column-gap: 20px;
    row-gap: 20px;
    div {
      .img {
        width: 100%;
        height: 200px;
        position: relative;
        img {
          width: 100%;
          height: 100%;
        }
        a {
          font-weight: bold;
          position: absolute;
          top: 5px;
          left: 5px;
          text-decoration: none;
          &:hover {
            text-decoration: underline;
          }
        }
      }
      .links-list {
        width: 100%;
        height: 200px;
        ul {
          list-style: none;
          width: 100%;
          height: 100%;
          display: flex;
          flex-direction: column;
          justify-content: space-around;
          font-size: 14px;
          li {
            a {
              text-decoration: none;
              color: black;
              &:hover {
                text-decoration: underline;
              }
            }
          }
        }
      }
    }
  }
  .shop-landing__card-image-wrapper {
    margin-top: 20px;
    width: 70%;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid;
    .title {
      margin: 0;
      font-size: 24px;
      span {
        display: block;
        font-weight: bold;
      }
    }
    p {
      width: 350px;
      text-align: left;
      margin-right: 40px;
    }
    button {
      font-size: 16px;
      width: 200px;
      height: 50px;
      background-color: transparent;
      border: 2px solid black;
      &:hover {
        background-color: black;
        color: white;
        cursor: pointer;
      }
    }
  }
  .Shop_Bestsellers {
    margin-top: 40px;
    width: 70%;
    height: max-content;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    position: relative;
    h2 {
      font-family: "Roboto Flex", sans-serif;
      letter-spacing: 3px;
    }
    #arrow {
      width: 30px;
      height: 30px;
      position: absolute;
      right: 10px;
    }
    .Bestsellers-products {
      box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px;
      margin-top: 30px;
      padding: 40px;
      width: 100%;
      height: 100%;
      display: grid;
      grid-template-columns: repeat(12, 1fr);
      column-gap: 40px;
      overflow-x: auto;
      overflow-y: hidden;
      box-sizing: border-box;
      &::-webkit-scrollbar {
        display: none;
      }
      .products {
        width: 200px;
        height: 230px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        img {
          width: 150px;
          height: 150px;
        }
        a {
          text-decoration: none;
          color: black;
          text-align: left;
          font-size: 16px;
          &:hover {
            color: $or;
          }
        }
        p {
          align-self: flex-start;
          font-weight: bold;
        }
      }
    }
  }
  .recommendedProducts {
    width: 70%;
    height: max-content;
    margin-top: 50px;
    h2 {
      font-family: "Roboto Flex", sans-serif;
      letter-spacing: 3px;
    }
    .products {
      margin-top: 30px;
      width: 100%;
      height: max-content;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(330px, 1fr));
      column-gap: 50px;
      row-gap: 40px;
      a {
        height: 240px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        color: black;
        text-decoration: none;
        border-bottom: 1px solid rgb(112, 112, 112);
        box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
        padding: 10px;
        transition: all 0.2s ease-in-out;
        &:hover {
          transform: scale(1.1);
        }
        div {
          width: 100%;
          height: 50%;
          background-position: center;
          background-size: contain;
          background-repeat: no-repeat;
        }
        .price {
          font-weight: bold;
        }
        .category {
          color: gray;
        }
        .name {
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          max-width: 300px;
        }
      }
    }
  }
  .ad {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 20px;
    padding-bottom: 20px;
    margin-top: 50px;
    width: 70%;
    height: max-content;
    @media screen and (max-width:800px) {
      width: 90%;
      img{
        width: 100%;
      }
    }
  }
}

@media screen and (max-width: 1288px) {
  .product-container {
    .submenu {
      display: none;
    }
  }
}
@media screen and (max-width: 948px) {
  .product-container {
    .pub-container_with_landing-nav-list {
      width: 100%;
      flex-direction: column;
      height: max-content;
      .shop-landing__rail-nav-list {
        display: none;
      }
      .homlee_shop_img {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        img {
          width: 95%;
          height: 180px;
        }
      }
    }
    .shop-landing__department-links-container {
      margin-top: 20px;
      width: 70%;
      height: max-content;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(100%, 1fr));
      column-gap: 20px;
      row-gap: 20px;
    }
    .shop-landing__card-image-wrapper {
      margin-top: 20px;
      width: max-content;
      height: max-content;
      display: flex;
      flex-direction: column;
      align-items: center;
      border: 2px solid;
      box-sizing: border-box;
      padding: 10px;
      .title {
        margin: 0;
        margin-bottom: 7px;
        font-size: 18px;
        width: max-content;
      }
      p {
        margin: 0px;
        text-align: center;
      }
      button {
        font-size: 14px;
        width: 180px;
        height: 50px;
        margin: 7px 0px 7px 0px;
      }
    }
    .Bestsellers-products {
      width: 80%;
    }
    .recommendedProducts {
      width: 80%;
      .products {
        margin-top: 30px;
        width: 100%;
        height: max-content;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100%, 1fr));
        column-gap: 50px;
        row-gap: 40px;
      }
    }
  }
}
</style>
