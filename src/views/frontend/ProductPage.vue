<template>
  <main class="productpage_main">
    <div class="shop_Breadcrumbs">
      <a href="">首頁/ </a>
      <a href="">商城 /</a>
      <span> 熱銷商品</span>
    </div>
    <div class="product_info">
      <div class="product_image">
        <Heart></Heart>
        <img src="@/assets/image/productimage/productimage0.png" alt="" />
      </div>
      <div class="product_txt">
          <h1>MUSE筆記本</h1>
          <p>
            作為謬思博物館的精神象徵，將智慧和美感帶入您的生活中。謬思女神小銅像，讓智慧之光永遠照耀著您的生活。
          </p>
        <span>NTD 3,500</span>
        <div class="product_function">
          <div class="product_count">
            <button @click="decrease"><font-awesome-icon :icon="['fas', 'minus']" id="minus"/></button>
            <span>{{ count }}</span>
            <button @click="increase"><font-awesome-icon :icon="['fas', 'plus']" id="plus"/></button>
          </div>

          <button>加入購物車</button>
        </div>
        <Collapse simple accordion>
          <Panel name="1">
            商品說明
            <template #content
              >成分:<br />
              聚酯纖維。</template
            >
          </Panel>
          <Panel name="2">
            規格尺寸
            <template #content>100ml/瓶</template>
          </Panel>
        </Collapse>
      </div>
    </div>
    <div class="product_detail">
      <h2>設計概念</h2>
      <p>十字寶球造型香水的設計概是融合了神秘、歷史和奇幻元素的香水，具有以下的特點和理念：<br />神秘與歷史：這款香水的設計靈感來自神秘的歷史事件或傳說中的寶藏。試圖喚起使用者對古老文明、探險和冒險的感覺。<br />裝置設計：香水瓶的外觀以十字寶球為靈感，採用獨特的球形或交叉圖案設計。這個設計元素可能代表著寶藏、交匯、神秘和歷史的符號。<br />香調的神秘性：香水的香調採用了特殊的手法，以創造一種深沉、複雜的香氣。</p>
    </div>
    <ProductWrap></ProductWrap>
  </main>
</template>

<script>
import Heart from '/src/components/Heart.vue'
import ProductWrap from '/src/components/ProductWrap.vue'
import Footer from '/src/components/Footer.vue'
export default {
  components: {
    Heart,
    ProductWrap,
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
    deleteProduct(index) {
      this.navTitle.splice(index, 1);
    },
  },
  mounted(){
    document.body.style.height = `auto`;
  }
};
</script>

<style lang="scss" scoped>
@import "@/assets/sass/style.scss";
h1{
  font-size: 20px;
}
.productpage_main{
  max-width: 1000px;
  margin: 0 auto;
}
</style>
