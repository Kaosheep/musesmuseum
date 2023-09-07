<template>
  <Carousel v-model="value" autoplay loop autoplay-speed="4000" class="shopdetail_carousel">
    <CarouselItem class="banner">
      <img src="../assets/image/productimage/banner/AntoinettePoudre.png"/>
    </CarouselItem>
    <CarouselItem class="banner">
      <img src="../assets/image/productimage/banner/Venuslipstick.png" />
    </CarouselItem>
    <CarouselItem class="banner">
      <img src="../assets/image/productimage/banner/Louise-Maske.png" />
    </CarouselItem>
  </Carousel>
  <h1>熱銷商品</h1>
  <div class="shopdetail_block">
  <div class="shopdetail_Breadcrumbs">
    <a href="">首頁/ </a>
    <a href="">商城 /</a>
    <a href="">熱銷商品</a>
  </div>
  <select class="shopdetail_filter">
    <option>熱門排行</option>
    <option>價格低至高</option>
    <option>價格高至低</option>
    <option>名稱筆畫</option>
  </select>
  </div>
  <div class="shopdetail_wrap">
    <aside class="shopdetail_aside">
      <a href="">熱銷商品</a>
      <a href="">仿品收藏</a>
      <a href="">經典畫作</a>
      <a href="">典雅瓷器</a>
      <a href="">書籍影視</a>
      <a href="">設計小物</a>
      <a href="">禮品專區</a>
    </aside>
    <div class="shopdetail_container">
      <div class="item" v-for="(item, index) in productlist" :key="index">

        <div class="image">
          <img :src="require('../assets/image/productimage/productimage'+index +'.png')" :alt="item.item"/>
        </div>
        <div class="info">
          <span>{{ item.item }}</span>
          <span>{{ item.price }}</span>
        </div>
      </div>
    </div>
  </div>
  <Page :total="30" class="pagination"/>
</template>

<script>
export default {
  data() {
    return {
      value: 0,
      productlist: [
        {
          item: "小謬思雕像",
          price: 3500,
        },
        {
          item: "手繪紅鶴小廢包",
          price: 3000,
        },
        {
          item: "維納斯口紅",
          price: 2500,
        },
        {
          item: "諾貝爾仿徽",
          price: 3500,
        },
        {
          item: "謬思聯名素T",
          price: 400,
        },
        {
          item: "草地上的聖母 (水彩)",
          price: 300,
        },
        {
          item: "黑帝斯筆記本",
          price: 1500,
        },
        {
          item: "謬思博物館小模型",
          price: 2500,
        },
      ],
    };
  },
  methods: {},
};
</script>
<style scoped lang="scss">
@import "../assets/sass/style.scss";
h1{
  text-align: center;
  font-size: 32px;
}
</style>
