<template>
  <main v-if="foundObject" class="productpage_main">
    <div class="shop_Breadcrumbs">
      <router-link to="/Home"> 首頁 / </router-link>
      <router-link to="/Home/Shop"> 精選商城 / </router-link>
      <span>{{ foundObject.prod_name }}</span>
    </div>
    <div class="product_info">
      <div class="product_image">
        <img :src="(`${this.$store.state.imgpublicpath}image/productimage/` + foundObject.prod_img)" :alt="foundObject.prod_name" />
        <div>
          <Heart :loveid="$route.params.prod_id"> </Heart>
          <p>收藏</p>
        </div>
      </div>
      <div class="product_txt">
        <h1>
          {{ foundObject.prod_name }}
        </h1>
        <span>
          {{ foundObject.prod_sellingprice }}
        </span>
        <div class="product_function">
          <div class="product_count">
            <button @click="decrease">
              <font-awesome-icon :icon="['fas', 'minus']" id="minus" />
            </button>
            <span>
              {{ count }}
            </span>
            <button @click="increase">
              <font-awesome-icon :icon="['fas', 'plus']" id="plus" />
            </button>
          </div>
          <button @click="addcart">加入購物車</button>
        </div>
        <Collapse simple accordion>
          <Panel name="1">
            商品規格
            <template #content>
              {{ foundObject.prod_spec }}
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
      <h2>商品描述</h2>
      <p>
        {{ foundObject.prod_desc }}
      </p>
    </div>
    <div class="recommend">
      <h2>推薦商品</h2>
      <!-- <ProductWrap></ProductWrap> -->
    </div>
  </main>
</template>

<script>
import Heart from "/src/components/Heart.vue";
import ProductWrap from "/src/components/ProductWrap.vue";
import Footer from "/src/components/Footer.vue";

export default {
  components: {
    Heart,
    ProductWrap,
    Footer,
  },
  data() {
    return {
      count: 1,
      foundObject: {},
      produstdislist: [],
      lovescol: [],
      storage: localStorage,
      publicpath: "http://localhost/musesmuseum/public/phps/",
    };
  },
  methods: {
    loveid(id) {
      this.loven = this.$route.params.prod_id;
    },
    getlove() {
      const formData = new URLSearchParams();
      formData.append("mbr_id", this.$store.state.mbr_id);

      fetch(`${this.$store.state.publicpath}love_fetch.php`, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: formData,
      }).then(async (response) => {
        this.lovescol = await response.json();
      });
    },
    fetchprod() {
      fetch(`${this.$store.state.publicpath}productPage.php`).then(async (response) => {
        this.produstdislist = await response.json();
        const idToFind = this.$route.params.prod_id;
        this.foundObject = this.produstdislist.find((item) => item.prod_id === idToFind); 
      })
      .catch((error) => {
        console.error('發生錯誤:', error);
      });
    },
    decrease() {
      if (this.count > 1) {
        this.count--;
      }
    },
    increase() {
      this.count++;
    },
    addcart() {
      const prod_id = this.$route.params.prod_id;
      console.log(this.$route.params.prod_id);
      if (this.storage["addItemlist"] == null) {
        this.storage["addItemlist"] = "";
      }
      let additem = this.produstdislist.find((item) => item.prod_id === prod_id);
      console.log(additem)
      this.storage["addItemlist"] += `${prod_id},`;
      if (this.storage[prod_id]) {
        let itemstr = [...this.storage[prod_id].split(",")];
        let nowamount = parseInt(itemstr.slice(4, 5));
        let inputnum = this.count;
        nowamount += inputnum;
        itemstr.splice(4, 1, nowamount);
        this.storage[prod_id] = "";
        this.storage[prod_id] += itemstr;
      } else {
        this.storage[prod_id] = "";
        this.storage[prod_id] += `${prod_id},`;
        this.storage[prod_id] += `${additem.prod_name},`;
        this.storage[prod_id] += `${additem.prod_sellingprice},`;
        this.storage[prod_id] += `${additem.prod_img},`;
        this.storage[prod_id] += "1,";
      }
    },
  },
  watch: {
    '$route.params.prod_id': 'fetchData',
  },
  mounted() {
    document.body.style.height = `auto`;
    this.fetchprod();
    // const idToFind = this.$route.params.prod_id;
    // this.foundObject = this.produstdislist.find((item) => item.prod_id === idToFind);
  },
};
</script>

<style lang="scss" scoped>
h1 {
  font-size: 20px;
}
.productpage_main {
  max-width: 1000px;
  margin: 0 auto;
  width: 83.33%;
}
</style>
