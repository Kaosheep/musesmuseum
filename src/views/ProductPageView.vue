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
            <button @click="decrement">-</button>
            <input type="text" v-model="count">
            <button @click="increment">+</button>
          </div>
          <button>加入購物車</button>
        </div>
        <div class="product_detail_sub">
          <span>商品說明</span>
          <span>+</span>
          <div>
            內容
          </div>
        </div>
        <div>
          <span>規格尺寸</span>
          <span>+</span>
          <div>
            內容
          </div>
        </div>
        <div>
          <span>歷史說明</span>
          <span>+</span>
          <div>
            內容
          </div>
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
      count: 0
    }
  },
  methods: {
    increment() {
      this.count++;
    },
    decrement() {
      if (this.count > 0) {
        this.count--;
      }
    }
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

.product_card {
  display: flex;
  margin: 0 auto;
}

.product_card div {
  width: 25%;
  border: 1px solid black;
}
</style>
