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
  <h1>熱銷商品</h1>
  <div class="shop_block">
    <div class="shop_Breadcrumbs">
      <a href="">首頁/ </a>
      <a href="">商城 /</a>
      <a href="">熱銷商品</a>
    </div>
    <div class="search">
      <Searchbar @click="searchClick"/>
      <Searchbarclick/>
    </div>
  </div>
  <div class="shop_wrap">
    <aside class="shop_aside">
      <router-link :to="a.link" v-for="a in aside">
        <button class="pinkBtn">
          {{ a.name }}
        </button>
      </router-link>
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
      <div class="item" v-for="(item, index) in produstdisplay" :key="index" v-else>
        <router-link to="/Home/ProductPage/#">
          <div class="image">
            <img :src="item.image" :alt="item.title"/>
          </div>
        </router-link>
        <div class="info">
          <span>
            <Heart>
            </Heart>
            <router-link to="/ProductPage">
              {{item.title}}
            </router-link>
            <font-awesome-icon :icon="['fas', 'cart-shopping']" id="car" />
          </span>
          <router-link to="/ProductPage">
            <span>
              ${{item.price}}
            </span>
          </router-link>   
        </div>
      </div>
    </div>
  </div>
  <div class="page">
    <Page :total="10" class="pagination"/>
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
        { link: "", name: "熱銷商品" },
        { link: "", name: "聯名系列" },
        { link: "", name: "時尚彩妝" },
        { link: "", name: "典藏畫作" },
        { link: "", name: "生活用品" },
        { link: "", name: "精選書籍" },
        { link: "", name: "翻玩小物" },
      ],
      produstdisplay: [
        {
          title: "MUSES筆記本",
          price: 350,
          image: require('@/assets/image/productimage/productimage0.png'),
        },
        {
          title: "手繪紅鶴小廢包",
          price: 3000,
          image: require('@/assets/image/productimage/productimage1.png'),
        },
        {
          title: "維納斯口紅",
          price: 2500,
          image: require('@/assets/image/productimage/productimage2.png'),
        },
        {
          title: "諾貝爾仿徽",
          price: 3500,
          image: require('@/assets/image/productimage/productimage3.png'),
        },
        {
          title: "MUSES素T",
          price: 400,
          image: require('@/assets/image/productimage/productimage4.png'),
        },
        {
          title: "路易絲面膜",
          price: 300,
          image: require('@/assets/image/productimage/productimage5.png'),
        },
        {
          title: "草地上的聖母筆記本",
          price: 1500,
          image: require('@/assets/image/productimage/productimage6.png'),
        },
        {
          title: "皮革筆記本",
          price: 499,
          image: require('@/assets/image/productimage/productimage7.png'),
        },
        {
          title: "MUSES博物館迷你模型",
          price: 1499,
          image: require('@/assets/image/productimage/productimage8.png'),
        },
        {
          title: "MUSES咖啡杯盤組",
          price: 699,
          image: require('@/assets/image/productimage/productimage9.png'),
        },
        {
          title: "MUSES帆布袋",
          price: 450,
          image: require('@/assets/image/productimage/productimage10.png'),
        },
        {
          title: "派對動物-A款",
          price: 299,
          image: require('@/assets/image/productimage/productimage11.png'),
        },
        {
          title: "派對動物-B款",
          price: 299,
          image: require('@/assets/image/productimage/productimage12.png'),
        },
      ],
      produstlist: [
        {
          title: "MUSES筆記本",
          price: 350,
          image: require('@/assets/image/productimage/productimage0.png'),
        },
        {
          title: "手繪紅鶴小廢包",
          price: 3000,
          image: require('@/assets/image/productimage/productimage1.png'),
        },
        {
          title: "維納斯口紅",
          price: 2500,
          image: require('@/assets/image/productimage/productimage2.png'),
        },
        {
          title: "諾貝爾仿徽",
          price: 3500,
          image: require('@/assets/image/productimage/productimage3.png'),
        },
        {
          title: "MUSES素T",
          price: 400,
          image: require('@/assets/image/productimage/productimage4.png'),
        },
        {
          title: "路易絲面膜",
          price: 300,
          image: require('@/assets/image/productimage/productimage5.png'),
        },
        {
          title: "草地上的聖母筆記本",
          price: 1500,
          image: require('@/assets/image/productimage/productimage6.png'),
        },
        {
          title: "皮革筆記本",
          price: 499,
          image: require('@/assets/image/productimage/productimage7.png'),
        },
        {
          title: "MUSES博物館迷你模型",
          price: 1499,
          image: require('@/assets/image/productimage/productimage8.png'),
        },
        {
          title: "MUSES咖啡杯盤組",
          price: 699,
          image: require('@/assets/image/productimage/productimage9.png'),
        },
        {
          title: "MUSES帆布袋",
          price: 450,
          image: require('@/assets/image/productimage/productimage10.png'),
        },
        {
          title: "派對動物-A款",
          price: 299,
          image: require('@/assets/image/productimage/productimage11.png'),
        },
        {
          title: "派對動物-B款",
          price: 299,
          image: require('@/assets/image/productimage/productimage12.png'),
        },
      ],
      searchinput: "",
      sortType: "商品排序",
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
    priceClick(type){
      if(this.sortType != type){
        this.sortType = type;
      }
    },
  },
  computed: {
    produstdisplay() {
      return this.produstdisplay.slice().sort((a, b) => {
        if(this.sortType === 'asc') {
          return a.price - b.price;
        } else if(this.sortType === 'desc'){
          return b.price - a.price;
        }
      });
    }
  },
  mounted() {
    document.body.style.height = `auto`;
  }
};
</script>
<style scoped lang="scss">
  h1 {
    text-align: center;
    font-size: 32px;
  }
</style>