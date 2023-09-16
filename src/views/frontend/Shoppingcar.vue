<template>
  <div class="shoppingcar_stepbar">
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
  <!-- mbl:mightbuylist；mbi:mightbuyitem -->
  <div class="shoppingcar_mbl">
    <div class="dot"></div>
    <input type="checkbox" class="checkAll">
    <label>全選</label>
    <div class="shoppingcar_mbi">
      <input type="checkbox">
      <div class="shoppingcar_productimage">
        <img src="@/assets/image/productimage/productimage0.png" alt="" />
      </div>
      <div class="shoppingcar_productinfo">
        <p>
            MUSES質感束帶筆記本
        </p>
        <div class="shoppingcar_function">
          <div class="shoppingcar_productcount">
            <button @click="decrease">
              <font-awesome-icon :icon="['fas', 'minus']" id="minus"/>
            </button>
            <span>
              {{ count }}
            </span>
            <button @click="increase">
              <font-awesome-icon :icon="['fas', 'plus']" id="plus"/>
            </button>
            <span>
              $ 300
            </span>
          </div>
        </div>  
      </div>  
      <button class="shoppingcar_itemdelete">
        X
      </button>
    </div>
  </div>
  <div class="shoppingcar_total">
    <p>
      共<span>1</span>件商品
    </p>
    <p>
      商品總計<span>$300</span>
    </p>
  </div>
  <div class="shoppingcar_nextstep">
    <router-link to="/home/Shopping">
      <button class="pinkBtn">
        下一步
      </button>
    </router-link>
    <div class="dot"></div>
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
      decrease() {
        if (this.count > 0) {
          this.count--;
        }
      },
      increase() {
        this.count++;
      },    
  },
  mounted() {
    document.body.style.height = `auto`;
  }
};
</script>
<style scoped lang="scss">
  @import "@/assets/sass/style.scss";
</style>