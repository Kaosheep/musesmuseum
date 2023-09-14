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
      <img src="@/assets/image/productimage/heart.png" alt="">
      <img src="@/assets/image/productimage/shoppingcar.png" alt="">
      <label for="search"></label>
      <form action="">
        <input
          type="text"
          placeholder="Search"
          id="search"
          v-model="searchinput"
        />
        <button type="button" @click="searchClick">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
        <!-- <button type="button" @click="reset">
          <font-awesome-icon :icon="['fas', 'rotate-right']" />
        </button> -->
      </form>
    </div>
  </div>
  <div class="shop_wrap">
    <aside class="shop_aside">
      <router-link :to="a.link" v-for="a in aside">{{ a.name }}
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
              <img src="@/assets/image/productimage/heart.png" alt="">
              {{item.title}}
              <img src="@/assets/image/productimage/shoppingcar.png" alt="">
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

export default {
  components: {
    Footer,
  },
  data() {
    return {
      value: 0,
      aside: [
        { link: "", name: "熱銷商品" },
        { link: "", name: "MUSES系列" },
        { link: "", name: "聯名彩妝" },
        { link: "", name: "典藏畫作" },
        { link: "", name: "生活用品" },
        { link: "", name: "精選書籍" },
        { link: "", name: "翻玩小物" },
      ],
      produstdisplay: [
        {
          title: "MUSE筆記本",
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
          title: "謬思聯名素T",
          price: 400,
        },
        {
          title: "???面膜",
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
          title: "謬思博物館迷你模型",
          price: 1499,
        },
        {
          title: "謬思聯名咖啡杯盤組",
          price: 699,
        },
        {
          title: "謬思聯名帆布袋",
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
          title: "MUSE筆記本",
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
          title: "謬思聯名素T",
          price: 400,
        },
        {
          title: "???面膜",
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
          title: "謬思博物館迷你模型",
          price: 1499,
        },
        {
          title: "謬思聯名咖啡杯盤組",
          price: 699,
        },
        {
          title: "謬思聯名帆布袋",
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