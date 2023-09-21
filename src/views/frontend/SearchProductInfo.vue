<template>
  <div class="bgcGY cardCenter">
    <main class="searchProdMain">
      <div class="search">
        <Searchbar @click="searchClick" />
        <Searchbarclick />
      </div>
      <div class="backGroundCardbBlue"></div>
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
          <div v-for="(rowitem, rowindex) in productInfoArr" :key="rowindex" class="yellowRow">
            <div class="itemInfoList">{{ rowitem.id }}</div>
            <div class="itemInfoList">
              <img :src="require('@/assets/image/productimage/productimage' +
                rowindex +
                '.png')" :alt="rowitem.name" />
            </div>
            <div class="itemInfoList">{{ rowitem.name }}</div>
            <div class="itemInfoList">{{ rowitem.price }}</div>
            <div class="itemInfoList">{{ rowitem.count }}</div>
            <div class="itemInfoList">{{ rowitem.total }}</div>
            <!-- <div
                :id="rowitem.id"
                :name="rowitem.name"
                ></div> -->
          </div>

          <div class="underRow">
            <p>付款狀態</p>
            <p></p>
            <p>運送方式</p>
            <p></p>
            <p>訂單狀態</p>
            <p></p>
            <p>總金額</p>
            <p></p>
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
    };
  },
  methods: {
  },
  mounted() {
    // 去資料庫拿 productInfoArr
    // const idToFind = parseInt(this.$route.params.id);
    // this.productInfoArr = $ajax(`...php?id=${idToFind}`);
    this.productInfoArr = [
      { id: "A00103", pic: "@/assets/image/productimage", name: "muses筆記", date: "2023/08/01", price: "$200", count: "2", total: "$400" },
      { id: "A00104", pic: "@/assets/image/productimage", name: "muses筆記", date: "2023/08/01", price: "$200", count: "2", total: "$400" },
      { id: "A00105", pic: "@/assets/image/productimage", name: "muses筆記", date: "2023/08/01", price: "$200", count: "2", total: "$400" },
      { id: "A00106", pic: "@/assets/image/productimage", name: "muses筆記", date: "2023/08/01", price: "$200", count: "2", total: "$400" },
      { id: "A00107", pic: "@/assets/image/productimage", name: "muses筆記", date: "2023/08/01", price: "$200", count: "2", total: "$400" },
    ]

    document.body.style.height = `auto`;
  }
};
</script>
<style scoped lang="scss">
.search {
  height: 202px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.searchbar_search {
  margin: 0;
  box-shadow: 3px 3px 0px $mgreen;
}

@include t() {
  .search {
    height: auto;
    display: block;
    margin: 20px 0;
  }
}

.backGroundCard {
  display: flex;
  // flex-wrap: wrap;
  align-items: flex-start;
  justify-content: space-between;
}

.backGroundCardBtns {
  margin-right: 30px;
}

.productInfo {
  width: 100%;
  // flex-basis: calc(50% - 10px); 

}

.cardCenter {
  align-items: start;
}

@include t() {
  .backGroundCard {
    display: block;
  }

  .backGroundCardBtns,
  .productInfo {
    margin-right: 0;
  }

  .search {
    margin-right: auto;

    .searchbar_search {
      display: none;
    }

    .searchbarclick_search {
      display: block;
      margin: 20px auto 20px 0;
    }
  }
}
</style>