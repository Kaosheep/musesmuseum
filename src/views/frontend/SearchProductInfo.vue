<template>
  <div class="bgcGY cardCenter">
    <main class="searchProdMain">
      <div class="search">
        <Searchbar @click="searchClick" />
        <Searchbarclick />
      </div>
      <!-- <div class="backGroundCardbBlue"></div> -->
      <div class="backGroundCard">
        <div class="backGroundCardBtns">
          <router-link :to="a.link" v-for="a in memBtnLink">
            <button :class="[a.name === '訂單查詢' ? 'pinkBtnLight' : 'pinkBtn']">
              {{ a.name }}
            </button>
          </router-link>
        </div>
        <div class="productInfo">
          <div class="headerRow">
            <p>商品編號</p>
            <p></p>
            <p>商品</p>
            <p>單價</p>
            <p>數量</p>
            <p>小計</p>
          </div>
          <div v-for="(rowitem, rowindex) in productInfoArr" 
          :key="rowindex" 
          class="yellowRow">

            <div class="itemInfoList">{{ rowitem.id }}</div>
            <div class="itemInfoList">
              <img :src="(`${this.$store.state.imgpublicpath}image/productimage/` + item.prod_img)" :alt="rowitem.name" />
            </div>
            <div class="itemInfoList">{{ rowitem.name }}</div>
            <div class="itemInfoList">{{ rowitem.price }}</div>
            <div class="itemInfoList">{{ rowitem.count }}</div>
            <div class="itemInfoList">{{ rowitem.total }}</div>
          </div>

          <div class="underRow">
            <p>付款狀態</p>
            <div>已付款</div>
            <p>運送方式</p>
            <div>宅配</div>
            <p>訂單狀態</p>
            <div>已完成</div>
            <p>總金額</p>
            <div>1000</div>
          </div>
          <div class="pagination">
                <Page :total="productInfoArr.length" :page-size="itemsPerPage" v-model="currentPage"/>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import Footer from "@/components/Footer.vue";
import Searchbar from "/src/components/Searchbar.vue";
import Searchbarclick from "/src/components/Searchbarclick.vue";
export default {
  components: {
    Footer,
    Searchbar,
    Searchbarclick,
  },
  data() {
    return {
      productInfoArr: [],
      memBtnLink: [
        { link: "/Home/MemberInfo", name: "會員資料" },
        { link: "/Home/SearchProduct", name: "訂單查詢" },
        { link: "/Home/SearchTicket", name: "票券查詢" },
      ],
      currentPage: 1,
      itemsPerPage: 5,
    };
  },
  computed: {
    pagedProductInfo() {
      const startIndex = (this.currentPage - 1) * this.itemsPerPage;
      const endIndex = startIndex + this.itemsPerPage;
      return this.productInfoArr.slice(startIndex, endIndex);
    },
    totalPages() {
      return Math.ceil(this.productInfoArr.length / this.itemsPerPage);
    },
  },
  methods: {
  },
  mounted() {
    // 去資料庫拿 productInfoArr
    // const idToFind = parseInt(this.$route.params.id);
    // this.productInfoArr = $ajax(`...php?id=${idToFind}`);
    this.productInfoArr = [
      { id: "W001", pic: "@/assets/image/productimage", name: "muses筆記", date: "2023/08/01", price: "$200", count: "2", total: "$400" },
      { id: "K001", pic: "@/assets/image/productimage", name: "muses筆記", date: "2023/08/01", price: "$200", count: "2", total: "$400" },
      { id: "K003", pic: "@/assets/image/productimage", name: "muses筆記", date: "2023/08/01", price: "$200", count: "2", total: "$400" },
      { id: "L001", pic: "@/assets/image/productimage", name: "muses筆記", date: "2023/08/01", price: "$200", count: "2", total: "$400" },
      { id: "L002", pic: "@/assets/image/productimage", name: "muses筆記", date: "2023/08/01", price: "$200", count: "2", total: "$400" },
    ]

    document.body.style.height = `auto`;
  }
};
</script>
<style scoped lang="scss">

.backGroundCard{
  align-items: flex-start; 
  justify-content:center;
  }
  
  .cardCenter{
    align-items: start;
  }
.underRow{
  padding:10px 16px;
  display:flex;
  justify-content: space-between;
  border-top: 2px solid $mblue;
    p{
      // width: 80px;
      color: $mgreen;
    }
}

@include t(){
  .searchProdMain {
    .productInfo{
      .headerRow{
        p{
          margin: auto;
        }
      }
    }
    .underRow{
      text-align: start;
      flex-wrap: wrap;
      p{
        width: 80px;
      }
    }
  }
}
</style>