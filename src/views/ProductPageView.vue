<template>
  <div class="product">
    <div class="product_info">
      <div class="product_case_main">
        <div>
          <i class="fas fa-heart"></i> <!-- 使用Font Awesome的爱心图标 -->
        </div>
        <img src="../assets/musesL.png" alt="">
        <!-- <div class="product_case_sub">
                <img src="../assets/logo.png" alt="">
                <img src="../assets/logo.png" alt="">
                <img src="../assets/logo.png" alt="">
            </div> -->
      </div>
      <div class="product_detail">
        <div class="product_title">
          <h1>小謬思銅像</h1>
          <p>作為謬思博物館的精神象徵，將智慧和美感帶入您的生活中。謬思女神小銅像，讓智慧之光永遠照耀著您的生活。 </p>
        </div>
        <div class="product_price">NTD 3,500</div>
        <div class="product_function">
          <div class="product_count">
            <button @click="decrease">-</button>
            <div>{{ count }}</div>
            <button @click="increase">+</button>
          </div>
          <button>加入購物車</button>
        </div>
        <div class="product_detail_sub" v-for="(title, index) in navTitle" :key="index">
          <span @click="txtAppear(index)" class="navTitle">{{ title.title }}</span>
          <span class="navIcon">+</span>
          <p v-html="title.txt" :id="'navtxt' + index"></p>
        </div>
      </div>
    </div>
    <div class="product_card">
      <div>
        CARD
      </div>
      <div>
        CARD
      </div>
      <div>
        CARD
      </div>
      <div>
        CARD
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      count: 0,
      navTitle: [
        {
          title: "商品說明",
          txt: "成分:<br> 玫瑰精油（Rose Essential Oil）、維多利亞玫瑰精油 （Bulgarian Rose Essential Oil）、紫羅蘭香精。",
        },
        {
          title: "規格尺寸",
          txt: "100ml/瓶",
        },
        {
          title: "設計概念",
          txt: "十字寶球造型香水的設計概是融合了神秘、歷史和奇幻元素的香水，具有以下的特點和理念：<br>神秘與歷史：這款香水的設計靈感來自神秘的歷史事件或傳說中的寶藏。試圖喚起使用者對古老文明、探險和冒險的感覺。<br>裝置設計：香水瓶的外觀以十字寶球為靈感，採用獨特的球形或交叉圖案設計。這個設計元素可能代表著寶藏、交匯、神秘和歷史的符號。<br>香調的神秘性：香水的香調採用了特殊的手法，以創造一種深沉、複雜的香氣。",
        },
      ],
    }
  },
  methods: {
    decrease() {
      if (this.count > 0) {
        this.count--;
      }
    },
    increase() {
      this.count++;
    },
    deleteProduct(index) {
      this.navTitle.splice(index, 1);
    },

    txtAppear(index) {
      const navtxtId = 'navtxt' + index
      const navtxtIds = document.getElementById(navtxtId);
      if (navtxtIds.style.display === "none") {
        navtxtIds.style.display = "block"
      } else {
        navtxtIds.style.display = "none"
      }
    },
  }
}
</script>

<style lang="scss">
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');

* {
  box-sizing: border-box;
}

.product {
  width: 1200px;
  margin: 0 auto;
}

.product_info {
  display: flex;
  position: relative;
}

.product_case_main {
  width: 50%;

  img {
    width: 100%;
  }
}

.product_title {
  h1 {
    margin-top: 0;
  }
}

.product_detail {
  width: 50%;
  text-align: left;
  margin-left: 100px;

  p {
    width: 460px;
    background-color: #F4F2F2;
    line-height: 1.2;
    font-size: 25px;
    padding: 30px 10px;
  }

  .product_price {
    color: #AD0000;
    font-size: 40px;
  }
}

.product_function {
  display: flex;
  text-align: center;
  justify-content: space-between;
  /* 將子元素水平居中對齊 */
  align-items: center;

  /* 如果需要將子元素垂直居中對齊 */
  .product_count button {
    width: 60px;
    height: 60px;
    color: #F4F2F2;
    font-size: 60px;
    align-items: center;
    border-radius: 50%;
    background-color: #AD0000;
  }
}

.product_count {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
}

.product_count div {
  width: 50px;
  text-align: center;
  font-size: 24px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.product_card {
  display: flex;
  margin: 0 auto;
}

.product_card div {
  width: 25%;
  border: 1px solid black;
}

.navTitle,
.navIcon {
  display: inline-block;
  width: 50%;
  font-size: 24px;
}

.navTitle {
  text-align: left;
  margin-top: 20px;
}

.navIcon {
  text-align: right;
}

.product_detail_sub p {
  width: 100%;
}
</style>
