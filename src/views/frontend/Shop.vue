<template>
  <Carousel v-model="value" autoplay loop :autoplay-speed="4000" class="shop_carousel">
    <CarouselItem class="banner">
      <img src="@/assets/image/productimage/banner/banner0.jpg" />
    </CarouselItem>
    <CarouselItem class="banner">
      <img src="@/assets/image/productimage/banner/banner1.jpg" />
    </CarouselItem>
    <CarouselItem class="banner">
      <img src="@/assets/image/productimage/banner/banner2.jpg" />
    </CarouselItem>
    <CarouselItem class="banner">
      <img src="@/assets/image/productimage/banner/banner3.jpg" />
    </CarouselItem>
    <CarouselItem class="banner">
      <img src="@/assets/image/productimage/banner/banner4.jpg" />
    </CarouselItem>
    <CarouselItem class="banner">
      <img src="@/assets/image/productimage/banner/banner5.jpg" />
    </CarouselItem>
  </Carousel>
  <h1>精選商城</h1>
  <div class="shop_block">
    <div class="shop_Breadcrumbs">
      <router-link to="/Home"> 首頁 / </router-link>
      <router-link to="/Home/Shop"> 精選商城 </router-link>
    </div>
    <div class="search">
      <Searchbar :functype="1" @update-search-text="searchClick" />
    </div>
  </div>
  <div class="shop_wrap">
    <aside class="shop_aside">
      <li v-for="(list, index) in aside" :key="index">
        <button class="pinkBtn" @click="selectkind(list.kind)">
          {{ list.kind }}
        </button>
      </li>
      <select class="shop_filter" v-model="sortType" @change="priceClick(sortType)">
        <option>商品排序</option>
        <option value="asc">價格低至高</option>
        <option value="desc">價格高至低</option>
      </select>
    </aside>
    <div class="shop_container">
      <div v-if="productSorting == 0">還沒有商品唷!</div>
      <div class="item" v-for="(item, prod_id) in getPageItems" :key="prod_id" v-else>
        <router-link :to="`/Home/ProductPage/${prod_id}`">
          <div class="image">
            <img :src="require('@/assets/image/productimage/' + item.prod_image)" :alt="item.prod_name" />
          </div>
        </router-link>
        <div class="info">
          <span>
            <Heart> </Heart>
            <router-link :to="`/Home/ProductPage/${prod_id}`">
              <p>{{ item.prod_name }}</p>
            </router-link>
            <font-awesome-icon :icon="['fas', 'cart-shopping']" id="car" @click="addcart(prod_id)" />
          </span>
          <router-link :to="`/Home/ProductPage/${prod_id}`">
            <span> ${{ item.prod_sellingprice }} </span>
          </router-link>
        </div>
      </div>
    </div>
  </div>
  <div class="shop_paginationbar">
    <Page :total="productSorting.length" :page-size="pageItems" v-model="currentPage" class="shop_page" />
  </div>
</template>

<script>
import Footer from "/src/components/Footer.vue";
import Searchbar from "/src/components/Searchbar.vue";
import Heart from "/src/components/Heart.vue";
import Searchbarclick from "/src/components/Searchbarclick.vue";

export default {
  components: {
    Footer,
    Searchbar,
    Heart,
    Searchbarclick,
  },
  data() {
    return {
      value: 0,
      aside: [
        { kind: "所有商品" },
        { kind: "熱銷Top5" },
        { kind: "聯名系列" },
        { kind: "時尚彩妝" },
        { kind: "生活用品" },
        { kind: "辦公文具" },
        { kind: "翻玩小物" },
      ],
      produstdislist: [],
      searchinput: "",
      sortType: "商品排序",
      currentPage: 1,
      pageItems: 9,
      prodKind: "所有商品",
      storage: localStorage,
    };
  },
  computed: {
    categoryFilter() {
      return this.produstdislist.filter((v) => v.kind?.includes(this.prod_kind));
    },
    searchFilter() {
      // if (!this.searchinput) return this.categoryFilter;
      if (this.searchinput) {
        return this.categoryFilter.filter((v) =>
          v.title?.includes(this.searchinput)
        );
      } else {
        return this.categoryFilter
      }
    },
    productSorting() {
      return this.searchFilter.slice().sort((a, b) => {
        if (this.sortType === "asc") {
          return a.price - b.price;
        } else if (this.sortType === "desc") {
          return b.price - a.price;
        }
      });
    },
    getPageItems() {
      const startIndex = (this.currentPage - 1) * this.pageItems;
      const endIndex = startIndex + this.pageItems;
      return this.productSorting.slice(startIndex, endIndex);
    },
  },
  watch: {
    prodKind() {
      this.currentPage = 1;
    },
    searchinput() {
      this.currentPage = 1;
    },
    sortType() {
      this.currentPage = 1;
    },
  },
  methods: {
    fetchprod() {
      fetch(`${this.publicpath}shop.php`).then(async (response) => {
        this.produstdislist = await response.json();
      });
    },
    selectkind(kind) {
      this.prod_kind = kind;
    },
    searchClick(text) {
      this.searchinput = text;
    },
    reset() {
      this.searchinput = "";
    },
    priceClick(type) {
      if (this.sortType != type) {
        this.sortType = type;
      }
    },
    addcart(id) {
      if (this.storage["addItemlist"] == null) {
        this.storage["addItemlist"] = "";
      }
      let additem = this.produstdislist.find((item) => item.prod_id === id);

      this.storage["addItemlist"] += `${id},`;
      if (this.storage[id]) {
        let itemstr = [...this.storage[id].split(",")];
        // console.log(itemstr)
        let nowamount = parseInt(itemstr.slice(3, 4));
        nowamount++;
        itemstr.splice(3, 1, nowamount);
        this.storage[id] = "";
        this.storage[id] += itemstr;
      } else {
        this.storage[id] = "";
        this.storage[id] += `${prod_id},`;
        this.storage[id] += `${additem.prod_name},`;
        this.storage[id] += `${additem.prod_sellingprice},`;
        this.storage[id] += "1,";
      }
    },
  },
  mounted() {
  },
};
</script>
<style scoped lang="scss">
h1 {
  text-align: center;
  font-size: 32px;
}
</style>
