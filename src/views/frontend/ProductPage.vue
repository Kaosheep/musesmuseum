<template>
  <main class="productpage_main">
    <div class="shop_Breadcrumbs">
      <a href="">首頁 / </a>
      <a href="">商城 / </a>
      <span>熱銷商品</span>
    </div>
    <div class="product_info">
      <div class="product_image">
        <img src="@/assets/image/productimage/productimage0.png" alt="" />
        <div>
          <Heart></Heart>
          <p>
            加入收藏
          </p>
        </div>
      </div>
      <div class="product_txt">
        <h1>
          MUSES低調質感束帶筆記本
        </h1>
        <span>
          $ 300
        </span>
        <div class="product_function">
          <div class="product_count">
            <button @click="decrease"><font-awesome-icon :icon="['fas', 'minus']" id="minus"/></button>
            <span>
              {{ count }}
            </span>
            <button @click="increase"><font-awesome-icon :icon="['fas', 'plus']" id="plus"/></button>
          </div>
          <button>
            加入購物車
          </button>
        </div>
        <Collapse simple accordion>
          <Panel name="1">
            商品規格
            <template #content>
              尺寸：10.5 cm x 14.5 cm x 0.6 cm<br/>
              材質：PU皮革、紙質<br/>
              內頁材質：道林紙80g_黑白印刷<br/>
              備註： 網頁商品會因螢幕品牌或解析度不同而有色差，
              請以實品為主。<br/>
            </template>
          </Panel>
          <Panel name="2">
            配送方式
            <template #content>
              宅配：將商品配送至指定地點。<br/>
              超商取貨：依商品運送到達時間，自行至指定門市取貨。
            </template>
          </Panel>
        </Collapse>
      </div>
    </div>
    <div class="product_detail">
      <h2>
        商品描述
      </h2>
      <p>
        電子產品肆意發展的如今，筆記本電腦和手機已經逐漸替代了傳統手寫筆記本，你還記得當初那些開心的不開心的日子，隨手記下的心情嗎？這些流水賬式的敘述，都在提醒你珍惜每個陪在身邊的朋友，那些有關青春的美好記憶。筆記本不僅是優雅實用的傳統文化禮品，也是暫時丟開手機和電腦，感受手寫快樂的方式。
      </p>
    </div>
    <div class="recommend">
      <h2>
        推薦商品
      </h2>
      <ProductWrap></ProductWrap>
    </div>
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
