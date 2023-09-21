<template>
  <main class="productpage_main">
    <div class="shop_Breadcrumbs">
      <router-link to="/Home">
        首頁 / 
      </router-link>
      <router-link to="/Home/Shop">
        精選商城 / 
      </router-link>
      <span>{{ foundObject.title }}</span>
    </div>
    <div class="product_info">
      <div class="product_image">
        <img :src="foundObject.image" :alt="foundObject.title"/>
        <div>
          <Heart></Heart>
          <p>
            收藏
          </p>
        </div>
      </div>
      <div class="product_txt">
        <h1>
          {{ foundObject.title }}
        </h1>
        <span>
          {{ foundObject.price }}
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
              宅配到府：將商品配送至指定地點。<br/>
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
        foundObject:{},
        produstdisplay: [
          {
            id: 0,
            title: "MUSES筆記本",
            price: 350,
            image: require('@/assets/image/productimage/productimage0.png'),
          },
          {
            id: 1,
            title: "手繪紅鶴小廢包",
            price: 3000,
            image: require('@/assets/image/productimage/productimage1.png'),
          },
          {
            id: 2,
            title: "維納斯口紅",
            price: 2500,
            image: require('@/assets/image/productimage/productimage2.png'),
          },
          {
            id: 3,
            title: "諾貝爾仿徽",
            price: 3500,
            image: require('@/assets/image/productimage/productimage3.png'),
          },
          {
            id: 4,
            title: "MUSES素T",
            price: 400,
            image: require('@/assets/image/productimage/productimage4.png'),
          },
          {
            id: 5,
            title: "路易絲面膜",
            price: 300,
            image: require('@/assets/image/productimage/productimage5.png'),
          },
          {
            id: 6,
            title: "草地上的聖母筆記本",
            price: 1500,
            image: require('@/assets/image/productimage/productimage6.png'),
          },
          {
            id: 7,
            title: "皮革筆記本",
            price: 499,
            image: require('@/assets/image/productimage/productimage7.png'),
          },
          {
            id: 8,
            title: "MUSES博物館迷你模型",
            price: 1499,
            image: require('@/assets/image/productimage/productimage8.png'),
          },
          {
            id: 9,
            title: "MUSES咖啡杯盤組",
            price: 699,
            image: require('@/assets/image/productimage/productimage9.png'),
          },
          {
            id: 10,
            title: "MUSES帆布袋",
            price: 450,
            image: require('@/assets/image/productimage/productimage10.png'),
          },
          {
            id: 11,
            title: "派對動物-A款",
            price: 299,
            image: require('@/assets/image/productimage/productimage11.png'),
          },
          {
            id: 12,
            title: "派對動物-B款",
            price: 299,
            image: require('@/assets/image/productimage/productimage12.png'),
          },
        ],
      };
    },
    mounted() {
      const idToFind = parseInt(this.$route.params.id);
      this.foundObject = this.produstdisplay.find(item => item.id === idToFind);
      // this.foundObject =  {
      //       id: 11,
      //       title: "派對動物-A款",
      //       price: 299,
      //       image: require('@/assets/image/productimage/productimage11.png'),
      //     }

      document.body.style.height = `auto`;
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
  };
</script>

<style lang="scss" scoped>

  h1{
    font-size: 20px;
  }
  .productpage_main{
    max-width: 1000px;
    margin: 0 auto;
    width: 83.33%;
  }
</style>
