<template>
  <div class="news">
    <main class="news_main">
      <h1>最新消息<br />NEWS</h1>
      <div class="item" v-for="(item, index) in newscol" :key="index">
        <div class="txt">
          <span>{{ item.time }}</span>
          <h3>{{ item.title }}</h3>
          <p>{{ item.info }}</p>
        </div>
        <div class="image">
          <img
            :src="require('@/assets/image/news/n' + index + '.jpg')"
            alt=""
          />
        </div>
      </div>
    </main>
    <div class="page"><Page/></div>
  </div>
  
</template>

<script>
export default {
  data() {
    return {
      newscol: [
        {
          time: "2023-08-25",
          title: "抽象藝術簡談",
          info: "本館將舉辦一系列藝術家講座，本次邀請知明藝術家小林堅丙、伍時媛分享他們的創作理念和經驗。為藝術愛好者提供與藝術家近距離互動的機會。本館將舉辦一系列藝術家講座，本次邀請知明藝術家小林堅丙、伍時媛分享他們的創作理念和經驗。為藝術愛好者提供與藝術家近距離互動的機會。",
          imgsrc: "",
        },
        {
          time: "2023-07-15",
          title: "文青集社—意象創作展",
          info: "近期熱門的文青集社來了!除了於本館展出最新作品外，經典系列也會收錄在這次創作展中。喜愛文青集社作品的人可別錯過了!",
          imgsrc: "",
        },
        {
          time: "2023-06-22",
          title: "清晨台北",
          info: "攝影新星—巫隆迺，用最擅長的黑白鏡頭帶領大家一同深入台灣角落。感受發生於台北之中的各種酸甜苦辣",
          imgsrc: "",
        },
      ],
    };
  },
  methods: {},
  mounted() {
    document.body.style.height = `auto`;
  },
};
</script>

<style scoped lang="scss">
.news {
  background-image: linear-gradient(45deg, $mlblue 50%, $myellow 50%);
  padding:20px 0 50px;
  .news_main {
    width: 71%;
    margin: auto;
    @include t(){
      width: 90%;
    }
    h1 {
      margin: 0 0 2rem;
      background-color: #fff;
      @include title($color:$mgreen);
    }
    .item {
      border-radius: 10px;
      background-color: #fff;
      border: 3px solid $mgreen;
      box-shadow: 16px 16px 0px $mgreen;
      display: flex;
      margin-bottom: 3rem;
      padding: 3rem;
      gap: 1rem;
      @include t(){
        padding: 1.5rem;
      }
      @include m(){
        flex-direction: column;
      }
      .txt {
        width: 50%;
        @include m(){
        width: 100%;
      }
        span{
          display: block;
        }
        h3{
          line-height: 1.5;
          margin: 1.5rem 0;
          background-color: $myellow;
          display: inline-block;
        }
      }
      .image {
        width: 50%;
        @include m(){
        width: 100%;
      }
        img {
          object-fit: cover;
          width: 100%;
          height: 100%;
          border-radius: 10px;
        }
      }
    }
  }
  .page{
    text-align: center;
  }
}
</style>
