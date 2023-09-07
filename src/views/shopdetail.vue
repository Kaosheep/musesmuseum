<template>
  <div class="product">
    
  </div>
  <Carousel v-model="value" loop>
      <CarouselItem>
        <img src="~@/assets/image/Venuslipstick.png">
      </CarouselItem>
      <CarouselItem>
        <img src="~@/assets/image/AntoinettePoudre.png">
      </CarouselItem>
      <CarouselItem>
        <img src="~@/assets/image/Louise-Maske.png">
      </CarouselItem>
  </Carousel>

    <h1 style="text-align: center;">
      {{ text }}
    </h1>
    <div class="Breadcrumbs">
    <a href="">首頁/ </a>
    <a href="">商城 /</a>
    <a href="">熱銷商品</a>
   </div>
   <select class=filter>
    <option>熱門排行</option>
    <option>價格低至高</option>
    <option>價格高至低</option>
    <option>名稱筆畫</option>
   </select>
  
    <div class="shoprowone">
      <nav>
        <a>熱銷商品</a>
        <a>仿品收藏</a>
        <a>經典畫作</a>
        <a>典雅瓷器</a>
        <a>書籍影視</a>
        <a>設計小物</a>
        <a>禮品專區</a>
      </nav>
      <div>
        <div class="container">
    <div class="item">1</div>
    <div class="item">2</div>
    <div class="item">3</div>
    <div class="item">4</div>
    <div class="item">5</div>
    <div class="item">6</div>
    <div class="item">7</div>
    <div class="item">8</div>
    <div class="item">9</div>
</div>
</template>

<script>
  export default {
    data () {
      return {
          value: 0,
          text: '熱銷商品'
      }
    },
    methods: {
      callName(){
        this.text = 'eeeee'
      }
    },
  }
</script>
<style>
.demo-carousel{
  width: 100%;
  height: 10rem;
  background-color: #ddd;
}
.Breadcrumbs a{
  color: black;
  padding-left: 5px;
}
select .filter{
  justify-content: flex-end
}
nav{
  border: 1px solid black;
  background-color: #F4F2F2;
}
nav a{
  color: black;
  margin-bottom: 10px;
  display: block;
  border-bottom: 1px solid red;
}
.container{
     display: grid;
     grid-template-columns:repeat(3,1fr);
     grid-template-rows: repeat(3,1fr);
     height: 800px;
     width: 800px;
     grid-gap: 10px;
     margin: auto;
 }
.container div{
    text-align: center;
    background: pink;
}
.shoprowone{
  display: flex;
  justify-content: space-around;
  text-align: center;
}
.shoprowtwo{
  display: flex;
  justify-content: space-around;
  text-align: center;
}
.shoprowthree{
  display: flex;
  justify-content: space-around;
  text-align: center;
}
.shoprowone nav div{
  color: black;
}
</style>

