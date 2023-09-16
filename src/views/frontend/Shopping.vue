<template>
  <div class="shopping_stepbar">
    <div>
      <p>
        確認商品
      </p>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 73 19">
      <line x1="0.517578" y1="17.3965" x2="72.7871" y2="17.3965"/>
      <line x1="71.7612" y1="16.9869" x2="55.7612" y2="1.98688"/>
    </svg>
    <div>
      <p>
        配送方式<br>&<br>填寫資料<br>
      </p>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 73 19">
      <line x1="0.517578" y1="17.3965" x2="72.7871" y2="17.3965"/>
      <line x1="71.7612" y1="16.9869" x2="55.7612" y2="1.98688"/>
    </svg>
    <div>
      <p>
        完成訂購
      </p>
    </div>
  </div>
  <div class="shopping_step2">
    <div class="shopping_deliver">
      <h3>
        請選擇配送方式及填寫收件資料：
      </h3>    
      <select class="deliverway">
        <option>配送方式</option>
        <option>宅配到府</option>
        <option>超商取貨</option>
      </select>
      <label>
        <input type="checkbox">收件人同會員資訊
      </label>
      <label>收件人：
        <input type="text" class="textInner" required>
      </label>
      <label>地址：
        <select>
        <option>台北市</option>
        </select>
        <select>
        <option>中正區</option>
        </select>
        <input type="text" class="addresstext">
      </label>
      <label>連絡電話：
        <input type="text" class="textInner">
      </label>    
      <textarea placeholder="有甚麼想告訴謬思的嗎?"></textarea>    

    </div>
    <div class="fee_shopping">
      <p>
        商品總計<span>$300</span>
      </p>
      <p>
        運費<span>$70</span>
      </p>
      <p>
        合計<span>$370</span>
      </p>
    </div>
  </div>
  <div class="shopping_finish">
    <router-link to="">
      <button class="pinkBtn">
        送出訂單
      </button>
    </router-link>
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
        count: 0,
      };
    },
    methods: {
   
  },
  mounted() {
    document.body.style.height = `auto`;
  }
};
</script>
<style scoped lang="scss">
  @import "@/assets/sass/style.scss";
</style>