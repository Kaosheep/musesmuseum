<template>
  <Carousel v-model="value" autoplay loop autoplay-speed="4000" class="shop_carousel">
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
      <Heart/>
      <font-awesome-icon :icon="['fas', 'cart-shopping']" id="car1"/>
      <Searchbar/>
    </div>
  </div>
  <div class="shop_wrap">
    <aside class="shop_aside">
      <router-link :to="a.link" v-for="a in aside">
        <button class="pinkBtn">
          {{ a.name }}
        </button>
      </router-link>
      <select class="shop_filter">
        <option>
          商品排序
        </option>
        <option>
          價格低至高
        </option>
        <option>
          價格高至低
        </option>
      </select>
    </aside>
    <div class="shop_container">
      <div v-if="produstdisplay == 0">
        查無商品
      </div>
      <div class="item" v-for="(item, index) in produstdisplay" :key="index" v-else>
        <router-link to="/ProductPage">
          <div class="image">
            <img
              :src="
                require('@/assets/image/productimage/productimage' +
                  index +
                  '.png')
              "
              :alt="item.title"
            />
          </div>
          <div class="info">
            <span>
              <Heart></Heart>
              {{item.title}}
              <font-awesome-icon :icon="['fas', 'cart-shopping']" id="car" />
            </span>
            <span>${{item.price}}</span>
          </div>
        </router-link>
      </div>
    </div>
  </div>
  <div class="page">
    <Page :total="30" class="pagination" size="small" />
  </div>
</template>

<script>
import Footer from "/src/components/Footer.vue";
import Searchbar from "/src/components/Searchbar.vue";
import Heart from "/src/components/Heart.vue";

export default {
  components: {
    Footer, 
    Searchbar,
    Heart,
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
        },
        {
          title: "手繪紅鶴小廢包",
          price: 3000,
        },
        {
          title: "維納斯口紅",
          price: 2500,
        },
        {
          title: "諾貝爾仿徽",
          price: 3500,
        },
        {
          title: "MUSES素T",
          price: 400,
        },
        {
          title: "路易絲面膜",
          price: 300,
        },
        {
          title: "草地上的聖母筆記本",
          price: 1500,
        },
        {
          title: "皮革筆記本",
          price: 499,
        },
        {
          title: "MUSES博物館迷你模型",
          price: 1499,
        },
        {
          title: "MUSES咖啡杯盤組",
          price: 699,
        },
        {
          title: "MUSES帆布袋",
          price: 450,
        },
        {
          title: "派對動物-A款",
          price: 299,
        },
        {
          title: "派對動物-B款",
          price: 299,
        },
      ],
      productlist: [
      {
          title: "MUSES筆記本",
          price: 350,
        },
        {
          title: "手繪紅鶴小廢包",
          price: 3000,
        },
        {
          title: "維納斯口紅",
          price: 2500,
        },
        {
          title: "諾貝爾仿徽",
          price: 3500,
        },
        {
          title: "MUSES素T",
          price: 400,
        },
        {
          title: "路易絲面膜",
          price: 300,
        },
        {
          title: "草地上的聖母筆記本",
          price: 1500,
        },
        {
          title: "皮革筆記本",
          price: 499,
        },
        {
          title: "MUSES博物館迷你模型",
          price: 1499,
        },
        {
          title: "MUSES咖啡杯盤組",
          price: 699,
        },
        {
          title: "MUSES帆布袋",
          price: 450,
        },
        {
          title: "派對動物-A款",
          price: 299,
        },
        {
          title: "派對動物-B款",
          price: 299,
        },
      ],
      searchinput: "",
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
  },
  mounted() {
    document.body.style.height = `auto`;
  }
};
</script>
<style scoped lang="scss">
  @import "@/assets/sass/style.scss";
  h1 {
    text-align: center;
    font-size: 32px;
  }
</style>