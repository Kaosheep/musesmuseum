<template>
  <Carousel
    v-model="value"
    autoplay
    loop
    :autoplay-speed="4000"
    class="shop_carousel"
  >
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
  <h1>精選商品</h1>
  <div class="shop_block">
    <div class="shop_Breadcrumbs">
      <router-link to="/Home"> 首頁 / </router-link>
      <router-link to="/Home/Shop"> 精選商品 </router-link>
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
      <select
        class="shop_filter"
        v-model="sortType"
        @change="priceClick(sortType)"
      >
        <option>商品排序</option>
        <option value="asc">$$低至高</option>
        <option value="desc">$$高至低</option>
      </select>
    </aside>
    <div class="shop_container">
      <div v-if="productSorting == 0">查無商品</div>
      <div class="item" v-for="item in getPageItems" :key="item.prod_id" v-else>
        <router-link :to="`/Home/ProductPage/${item.prod_id}`">
          <div class="image">
            <img
              :src="
                `${this.$store.state.imgpublicpath}image/productimage/` +
                item.prod_img
              "
              :alt="item.prod_name"
            />
          </div>
        </router-link>
        <div class="info">
          <span>
            <Heart :loveid="item.prod_id"></Heart>
            <router-link :to="`/Home/ProductPage/${item.prod_id}`">
              <p>{{ item.prod_name }}</p>
            </router-link>
            <font-awesome-icon
              :icon="['fas', 'cart-shopping']"
              id="car"
              @click="[addcart(item.prod_id), addstore()]"
            />
          </span>
          <router-link :to="`/Home/ProductPage/${item.prod_id}`">
            <span> ${{ formatPrice(item.prod_sellingprice) }} </span>
          </router-link>
        </div>
      </div>
    </div>
  </div>
  <div class="shop_paginationbar">
    <Page
      :total="productSorting.length"
      :page-size="pageItems"
      v-model="currentPage"
      class="shop_page"
    />
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
      lovescol: [],
      value: 0,
      aside: [
        { kind: "所有商品" },
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
      publicpath: "http://localhost/musesmuseum/public/phps/",
    };
  },
  computed: {
    categoryFilter() {
      return this.produstdislist.filter((v) =>
        v.prod_kind?.includes(this.prodKind)
      );
    },
    searchFilter() {
      if (this.searchinput) {
        return this.categoryFilter.filter((v) =>
          v.prod_name?.includes(this.searchinput)
        );
      } else {
        return this.categoryFilter;
      }
    },
    productSorting() {
      return this.searchFilter.slice().sort((a, b) => {
        if (this.sortType === "asc") {
          return a.prod_sellingprice - b.prod_sellingprice;
        } else if (this.sortType === "desc") {
          return b.prod_sellingprice - a.prod_sellingprice;
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
    formatPrice(value) {
      return new Intl.NumberFormat("en-US", { style: "decimal" }).format(value);
    },
    success(nodesc) {
      this.$Notice.success({
        title: "加入購物車",
        desc: nodesc
          ? ""
          : "Here is the notification description. Here is the notification description. ",
      });
    },
    loveid(id) {
      this.loven = id;
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
      fetch(`${this.$store.state.publicpath}shop.php`)
        .then(async (response) => {
          this.produstdislist = await response.json();
          console.log(this.produstdislist);
        })
        .catch((error) => {
          console.error("發生錯誤:", error);
        });
    },
    selectkind(prod_kind) {
      this.prodKind = prod_kind;
    },
    searchClick(text) {
      this.searchinput = text.toUpperCase();
    },
    priceClick(type) {
      if (this.sortType != type) {
        this.sortType = type;
      }
    },
    warning(nodesc, w) {
      this.$Notice.warning({
        title: w,
        desc: nodesc
          ? ""
          : "Here is the notification description. Here is the notification description. ",
      });
    },
    addcart(prod_id) {
      if (!this.$store.state.mbr_id) {
        this.warning(true, "請先登入");
        setTimeout(() => {
          document.location.href = `${this.$store.state.imgpublicpath}Home/Login`;
        }, 500);
      } else {
        if (this.storage["addItemlist"] == null) {
          this.storage["addItemlist"] = "";
        }
        let additem = this.produstdislist.find(
          (item) => item.prod_id === prod_id
        );

        this.storage["addItemlist"] += `${prod_id},`;
        if (this.storage[prod_id]) {
          let itemstr = [...this.storage[prod_id].split(",")];
          // console.log(itemstr)
          let nowamount = parseInt(itemstr.slice(4, 5));
          nowamount++;
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
        this.success(true);
      }
    },
    addstore() {
      if (this.$store.state.mbr_id) {
        this.$store.state.cartnum += 1;
      }
    },
  },
  mounted() {
    const cookies = document.cookie.split(";");
    let members = null;

    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].trim();
      if (cookie.startsWith("members=")) {
        members = decodeURIComponent(cookie.substring("members=".length));

        break;
      }
    }

    if (members) {
      try {
        const memberInfo = JSON.parse(members);
        if (memberInfo.mbr_name && memberInfo.mbr_email) {
          this.memAllInfo = memberInfo;
          this.$store.state.mbr_id = this.memAllInfo.mbr_id;
        } else {
          console.error("Cookie中缺少屬性");
        }
      } catch (error) {
        console.error("解析Cookie數據錯誤", error);
      }
    }
    this.getlove();
    this.fetchprod();
  },
};
</script>
<style scoped lang="scss">
h1 {
  text-align: center;
  font-size: 32px;
}
</style>
