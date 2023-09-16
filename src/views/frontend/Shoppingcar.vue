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
  <!-- mbl:mightbuylist；mbi:mightbuyitem -->
  <div class="shopping_mbl">
    <div class="dot"></div>
    <input type="checkbox" class="checkAll">
    <label>全選</label>
    <div class="shopping_mbi">
      <input type="checkbox">
      <div class="shopping_productimage">
        <img src="@/assets/image/productimage/productimage0.png" alt="" />
      </div>
      <div class="shopping_productinfo">
        <p>
            MUSES質感束帶筆記本
        </p>
        <div class="shopping_function">
          <div class="shopping_productcount">
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
      <button class="shopping_itemdelete">
        X
      </button>
    </div>
  </div>
  <div class="total">
    <p>
      共<span>1</span>件商品<span>$300</span>
    </p>
    <p>
      總金額<span>$300</span>
    </p>
  </div>
  <button>
    下一步
  </button>
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