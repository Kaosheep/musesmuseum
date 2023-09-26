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
      <Searchbar @click="searchClick" />
      <Searchbarclick />
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
      <div v-if="productSorting == 0">查無商品</div>
      <div class="item" v-for="(item, id) in getPageItems" :key="id" v-else>
        <router-link :to="`/Home/ProductPage/${id}`">
          <div class="image">
            <img :src="item.image" :alt="item.title" />
          </div>
        </router-link>
        <div class="info">
          <span>
            <Heart> </Heart>
            <router-link :to="`/Home/ProductPage/${id}`">
              <p>{{ item.title }}</p>
            </router-link>
            <font-awesome-icon :icon="['fas', 'cart-shopping']" id="car" @click="addcart(id)" />
          </span>
          <router-link :to="`/Home/ProductPage/${id}`">
            <span> ${{ item.price }} </span>
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
// import $ from "jquery";

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
      produstdislist: [
        {
          id: 0,
          title: "MUSES筆記本",
          price: 350,
          image: require("@/assets/image/productimage/productimage0.png"),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 1,
          title: "手繪紅鶴小廢包",
          price: 3000,
          image: require("@/assets/image/productimage/productimage1.png"),
          kind: ["所有商品", "翻玩小物", "熱銷Top5"],
        },
        {
          id: 2,
          title: "維納斯口紅",
          price: 2500,
          image: require("@/assets/image/productimage/productimage2.png"),
          kind: ["所有商品", "時尚彩妝"],
        },
        {
          id: 3,
          title: "諾貝爾仿徽",
          price: 3500,
          image: require("@/assets/image/productimage/productimage3.png"),
          kind: ["所有商品", "翻玩小物"],
        },
        {
          id: 4,
          title: "MUSES素T",
          price: 400,
          image: require("@/assets/image/productimage/productimage4.png"),
          kind: ["所有商品", "聯名系列"],
        },
        {
          id: 5,
          title: "路易絲面膜",
          price: 300,
          image: require("@/assets/image/productimage/productimage5.png"),
          kind: ["所有商品", "翻玩小物"],
        },
        {
          id: 6,
          title: "草地上的聖母筆記本",
          price: 1500,
          image: require("@/assets/image/productimage/productimage6.png"),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 7,
          title: "皮革筆記本",
          price: 499,
          image: require("@/assets/image/productimage/productimage7.png"),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 8,
          title: "MUSES博物館迷你模型",
          price: 1499,
          image: require("@/assets/image/productimage/productimage8.png"),
          kind: ["所有商品"],
        },
        {
          id: 9,
          title: "MUSES咖啡杯盤組",
          price: 699,
          image: require("@/assets/image/productimage/productimage9.png"),
          kind: ["所有商品", "聯名系列", "生活用品"],
        },
        {
          id: 10,
          title: "MUSES帆布袋",
          price: 450,
          image: require("@/assets/image/productimage/productimage10.png"),
          kind: ["所有商品", "聯名系列", "生活用品", "熱銷Top5"],
        },
        {
          id: 11,
          title: "派對動物-A款",
          price: 299,
          image: require("@/assets/image/productimage/productimage11.png"),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 12,
          title: "派對動物-B款",
          price: 299,
          image: require("@/assets/image/productimage/productimage12.png"),
          kind: ["所有商品", "辦公文具", "熱銷Top5"],
        },
      ],
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
      return this.produstdislist.filter((v) => v.kind?.includes(this.prodKind));
    },
    searchFilter() {
      if (!this.searchinput) return this.categoryFilter;
      return this.categoryFilter.filter((v) =>
        v.title?.includes(this.searchinput)
      );
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
    selectkind(kind) {
      this.prodKind = kind
    },
    searchClick(text) {
      // <SSS @update-search-text="searchClick" />
      // this.$emit('update-search-text', '123')
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
      let additem = this.produstdislist.find((item) => item.id === id);

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
        this.storage[id] += `${id},`;
        this.storage[id] += `${additem.title},`;
        this.storage[id] += `${additem.price},`;
        this.storage[id] += '1,';
      }
    },
  },
  // mounted: {
  //   $id(id) {
  //     return document.getElementById(id);
  //   },
  //   showLoginForm() {
  //       $.ajax({
  //         url: "http://localhost/musesmuseum/piblic/php/ajaxLogout.php",
  //         dataType: "json",
  //         success(response){
  //         },
  //         error(xhr, status, error){
  //           console.log(status, error);
  //         }
  //       });
  //     }
  //   },
};
</script>
<style scoped lang="scss">
h1 {
  text-align: center;
  font-size: 32px;
}
</style>
