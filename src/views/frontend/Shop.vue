<template>
  <Carousel v-model="value" autoplay loop :autoplay-speed="4000" class="shop_carousel">
    <CarouselItem class="banner">
      <img src="@/assets/image/productimage/banner/AntoinettePoudre.png" />
    </CarouselItem>
    <CarouselItem class="banner">
      <img src="@/assets/image/productimage/banner/Venuslipstick.png" />
    </CarouselItem>
    <CarouselItem class="banner">
      <img src="@/assets/image/productimage/banner/Louise-Maske.png" />
    </CarouselItem>
  </Carousel>
  <h1>精選商城</h1>
  <div class="shop_block">
    <div class="shop_Breadcrumbs">
      <a href="">首頁 / </a>
      <a href="">精選商城</a>
    </div>
    <div class="search">
      <Searchbar @click="searchClick" />
      <Searchbarclick />
    </div>
  </div>
  <div class="shop_wrap">
    <aside class="shop_aside">
      <li v-for="list in aside" :key="list.index">
        <button class="pinkBtn" @click="prodKind = item.kind">
          {{ list.kind }}
        </button>
      </li>
      <select class="shop_filter" v-model="sortType" @change="priceClick(sortType)">
        <option>
          商品排序
        </option>
        <option value="asc">
          價格低至高
        </option>
        <option value="desc">
          價格高至低
        </option>
      </select>
    </aside>
    <div class="shop_container">
      <div v-if="produstdisplay == 0">
        查無商品
      </div>
      <div class="item" v-for="(item, id) in produstdisplay" :key="id" v-else>
        <router-link to="/Home/ProductPage/:id" @click="goToProductDetail(id)">
          <div class="image">
            <img :src="item.image" :alt="item.title" />
          </div>
        </router-link>
        <div class="info">
          <span>
            <Heart>
            </Heart>
            <router-link to="/Home/ProductPage/:id" @click="goToProductDetail(id)">
              {{ item.title }}
            </router-link>
            <font-awesome-icon :icon="['fas', 'cart-shopping']" id="car" />
          </span>
          <router-link to="/Home/ProductPage/:id" @click="goToProductDetail(id)">
            <span>
              ${{ item.price }}
            </span>
          </router-link>
        </div>
      </div>
      <Page :total="getTotalPage"/>
    </div>
  </div>
</template>

<script>
import Footer from "/src/components/Footer.vue";
import Searchbar from "/src/components/Searchbar.vue";
import Heart from "/src/components/Heart.vue";
import Searchbarclick from "/src/components/Searchbarclick.vue";

export default {
  components: {
    Footer,
    Searchbar,
    Heart,
    Searchbarclick,
  },
  data() {
    return {
      value: 0,
      aside: [
        {
          kind: "所有商品",
        },
        {
          kind: "熱銷Top5",
        },
        {
          kind: "聯名系列",
        },
        {
          kind: "時尚彩妝",
        },
        {
          kind: "生活用品",
        },
        {
          kind: "辦公文具",
        },
        {
          kind: "翻玩小物",
        },
      ],
      produstdisplay: [
        {
          id: 0,
          title: "MUSES筆記本",
          price: 350,
          image: require('@/assets/image/productimage/productimage0.png'),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 1,
          title: "手繪紅鶴小廢包",
          price: 3000,
          image: require('@/assets/image/productimage/productimage1.png'),
          kind: ["所有商品", "翻玩小物"],
        },
        {
          id: 2,
          title: "維納斯口紅",
          price: 2500,
          image: require('@/assets/image/productimage/productimage2.png'),
          kind: ["所有商品", "時尚彩妝"],
        },
        {
          id: 3,
          title: "諾貝爾仿徽",
          price: 3500,
          image: require('@/assets/image/productimage/productimage3.png'),
          kind: ["所有商品", "翻玩小物"],
        },
        {
          id: 4,
          title: "MUSES素T",
          price: 400,
          image: require('@/assets/image/productimage/productimage4.png'),
          kind: ["所有商品", "聯名系列"],
        },
        {
          id: 5,
          title: "路易絲面膜",
          price: 300,
          image: require('@/assets/image/productimage/productimage5.png'),
          kind: ["所有商品", "翻玩小物"],
        },
        {
          id: 6,
          title: "草地上的聖母筆記本",
          price: 1500,
          image: require('@/assets/image/productimage/productimage6.png'),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 7,
          title: "皮革筆記本",
          price: 499,
          image: require('@/assets/image/productimage/productimage7.png'),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 8,
          title: "MUSES博物館迷你模型",
          price: 1499,
          image: require('@/assets/image/productimage/productimage8.png'),
        },
        {
          id: 9,
          title: "MUSES咖啡杯盤組",
          price: 699,
          image: require('@/assets/image/productimage/productimage9.png'),
          kind: ["所有商品", "聯名系列", "生活用品"],
        },
        {
          id: 10,
          title: "MUSES帆布袋",
          price: 450,
          image: require('@/assets/image/productimage/productimage10.png'),
          kind: ["所有商品", "聯名系列", "生活用品"],
        },
        {
          id: 11,
          title: "派對動物-A款",
          price: 299,
          image: require('@/assets/image/productimage/productimage11.png'),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 12,
          title: "派對動物-B款",
          price: 299,
          image: require('@/assets/image/productimage/productimage12.png'),
          kind: ["所有商品", "辦公文具"],
        },
      ],
      produstdislist: [
        {
          id: 0,
          title: "MUSES筆記本",
          price: 350,
          image: require('@/assets/image/productimage/productimage0.png'),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 1,
          title: "手繪紅鶴小廢包",
          price: 3000,
          image: require('@/assets/image/productimage/productimage1.png'),
          kind: ["所有商品", "翻玩小物"],
        },
        {
          id: 2,
          title: "維納斯口紅",
          price: 2500,
          image: require('@/assets/image/productimage/productimage2.png'),
          kind: ["所有商品", "時尚彩妝"],
        },
        {
          id: 3,
          title: "諾貝爾仿徽",
          price: 3500,
          image: require('@/assets/image/productimage/productimage3.png'),
          kind: ["所有商品", "翻玩小物"],
        },
        {
          id: 4,
          title: "MUSES素T",
          price: 400,
          image: require('@/assets/image/productimage/productimage4.png'),
          kind: ["所有商品", "聯名系列"],
        },
        {
          id: 5,
          title: "路易絲面膜",
          price: 300,
          image: require('@/assets/image/productimage/productimage5.png'),
          kind: ["所有商品", "翻玩小物"],
        },
        {
          id: 6,
          title: "草地上的聖母筆記本",
          price: 1500,
          image: require('@/assets/image/productimage/productimage6.png'),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 7,
          title: "皮革筆記本",
          price: 499,
          image: require('@/assets/image/productimage/productimage7.png'),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 8,
          title: "MUSES博物館迷你模型",
          price: 1499,
          image: require('@/assets/image/productimage/productimage8.png'),
        },
        {
          id: 9,
          title: "MUSES咖啡杯盤組",
          price: 699,
          image: require('@/assets/image/productimage/productimage9.png'),
          kind: ["所有商品", "聯名系列", "生活用品"],
        },
        {
          id: 10,
          title: "MUSES帆布袋",
          price: 450,
          image: require('@/assets/image/productimage/productimage10.png'),
          kind: ["所有商品", "聯名系列", "生活用品"],
        },
        {
          id: 11,
          title: "派對動物-A款",
          price: 299,
          image: require('@/assets/image/productimage/productimage11.png'),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 12,
          title: "派對動物-B款",
          price: 299,
          image: require('@/assets/image/productimage/productimage12.png'),
          kind: ["所有商品", "辦公文具"],
        },
      ],
      searchinput: "",
      sortType: "商品排序",
      currentPage: 1,
      pageItems: 9,
      prodKind: "所有商品",
    };
  },
  methods: {
    searchClick() {
      const res = this.produstdisplay.filter((item) => {
        let answer = false;
        const title = item.title;
        answer = title.includes(this.searchinput);
        return answer;
      });
      this.produstdisplay = res;
    },
    reset() {
      this.searchinput = "";
      this.produstdisplay = this.productlist;
    },
    priceClick(type) {
      if (this.sortType != type) {
        this.sortType = type;
      }
    },
    goToProductDetail(id) {
      this.$router.push({
        name: 'ProductPage',
        params: {
          id: id,
        }
      });
    },
    // handlePageChange(page) {
    //   this.currentPage = page;
    // },
    // getPageItems() {
    //   const startIndex = (this.currentPage - 1) * this.pageItems;
    //   const endIndex = startIndex + this.pageItems;
    //   return this.catList.slice(startIndex, endIndex);
    // },
    getTotalPage(){
      return Math.ceil(this.produstdisplay.length / this.pageItems);
    },
  },
  computed: {
    produstdisplay() {
      return this.produstdisplay.slice().sort((a, b) => {
        if (this.sortType === 'asc') {
          return a.price - b.price;
        } else if (this.sortType === 'desc') {
          return b.price - a.price;
        }
      });
    },
    // catList() {
    //   if(this.prodKind === '所有商品'){
    //     return this.produstdisplay;
    //   }
    // },
  },
  mounted() {
    document.body.style.height = `auto`;
  },
}
</script>
<style scoped lang="scss">
h1 {
  text-align: center;
  font-size: 32px;
}
</style>