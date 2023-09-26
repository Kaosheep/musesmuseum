<template>
  <div class="museum_bg">
    <main>
      <h1>館內地圖<br>MAP</h1>
      <museum></museum>
      <div class="moinfo">
        <h2>空間介紹</h2>
        <div class="infocard" v-for="mlocal in localinfo">
          <div class="info_img">
            <img
              :src="require('@/assets/image/museumspace/' + mlocal.imgsrc)"
              :alt="mlocal.infoid"
            />
          </div>
          <div class="info_txt">
            <h3>{{ mlocal.h }}</h3>
            <p>
              {{ mlocal.p }}
            </p>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import museum from "@/components/museum.vue";
export default {
  components: {
    museum,
  },
  data() {
    return {
      localinfo: [
        {
          infoid: "store",
          imgsrc: "local0.jpg",
          h: "禮品店",
          p: `您可以尋找到美麗的明信片、精彩的博物館商品、精緻的手工藝品以及具有特色的紀念品，希望您帶回一些特別的東西，以永久紀念您在博物館的難忘時光。`,
        },
        {
          infoid: "localA",
          imgsrc: "local1.jpg",
          h: "展區A",
          p: `展覽將引領您進入一個充滿藝術與創新的世界。這個展覽將展示當代藝術家的最新作品，透過數位媒體、虛擬現實和互動裝置，讓您深入體驗藝術的未來。這是一個啟發靈感、探索創新和追尋藝術無限可能性的展覽，絕對不能錯過！`,
        },
        {
          infoid: "localB",
          imgsrc: "local2.jpg",
          h: "展區B",
          p: `展覽將帶您穿越時光，欣賞世界各地的歷史藝術珍品。
                    這次展覽匯集了來自不同文化和時代的精彩藝術品，從古埃及的青銅雕像到文藝復興時期的油畫傑作，讓您沉浸在藝術的豐富歷史中。這是一場引人入勝的藝術之旅，探索藝術如何反映了不同時代的價值觀和美學。`,
        },
        {
          infoid: "localC",
          imgsrc: "local3.jpg",
          h: "展區C",
          p: `帶您穿越時光的魔法隧道，探索過去和未來的神奇之處。品味歷史、夢想未來，這趟時光之旅將改變您對時間的看法。別錯過這場獨一無二的奇幻之旅！`,
        },
        {
          infoid: "rest",
          imgsrc: "local4.jpg",
          h: "餐廳",
          p: `提供各式咖啡、茶和點心，讓您盡情品味。室內舒適的座椅，希望您在寧靜的氛圍中放鬆身心，另外提供免費的Wi-Fi，讓您可以隨時與親朋好友分享您在博物館的體驗。`,
        },
        {
          infoid: "info",
          imgsrc: "local5.jpg",
          h: "服務處",
          p: `備有物品
                    (輪椅、嬰兒車、語音導覽)租借
                    遺失物認領
                    導覽地圖
                    急救設備AED`,
        },
      ],
    };
  },
  methods: {},
};
</script>

<style scoped lang="scss">
.museum_bg {
  background: rgb(251, 247, 150);
  background: linear-gradient(
    180deg,
    rgba(251, 247, 150, 1) 30%,
    rgba(195, 227, 232, 1) 70%
  );
  height: 100vh;
  @include t(){
    height: auto;
    padding-bottom: 80px;
  }
  main {
    width: 100%;
    max-width: 1280px;
    margin: auto;
    padding-left: 70px;
    overflow-x: hidden;
    @include t() {
      padding: 0;
      width: 100%;
      // height:calc(100vh - 70px);
      background: linear-gradient(
        180deg,
        rgba(251, 247, 150, 1) 15%,
        rgba(195, 227, 232, 1) 15%
      );
    }
    h1 {
      background-color: $mlblue;
      display: inline-block;
      padding: 1rem 2rem;
      border-radius: 20px;
      margin-left: 1.5rem;
      box-shadow: 8px 8px 0px $mpink;
      @include t() {
        margin-left: 2rem;
      }
    }
  }
}
.moinfo {
  display: none;
  @include t() {
    display: block;
  }

  margin: 50px auto 0px;
  width: 83.33%;
  background-color: $mlblue;
  h2 {
    text-align: center;
    line-height: 2;
  }
  .infocard {
    border: 3px dashed $mpink;
    border-radius: 20px;
    display: flex;
    padding: 2rem 1.5rem;
    margin-bottom: 1rem;
    background-color: #fff;
    gap: 1rem;
    @include m() {
      flex-direction: column;
    }
    .info_img {
      width: 40%;
      @include m() {
        width: 100%;
      }
      img {
        width: 100%;
        height: 100%;
        min-width:120px ;
        border-radius: 10px;
        object-fit: cover;
      }
    }
    .info_txt {
      width: 60%;
      @include m() {
        width: 100%;
        max-width: none;
      }
    }
  }
}
</style>
