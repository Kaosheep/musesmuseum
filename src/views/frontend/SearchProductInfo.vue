<template>
  <div class="bgcGY cardCenter">
    <main class="searchProdMain">
      <div class="search">
        <Searchbar :functype="1" @update-search-text="searchClick" />
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
          <div v-for="(rowitem, rowindex) in productInfoArr" :key="rowindex" class="yellowRow">
            <div class="itemInfoList">{{ rowitem.prod_id  }}</div>
            <div class="itemInfoList">
              <img :src="(`${this.$store.state.imgpublicpath}image/productimage/` + rowitem.prod_img)"
                :alt="rowitem.prod_name" />
            </div>
            <div class="itemInfoList">{{ rowitem.prod_name }}</div>
            <div class="itemInfoList">{{ rowitem.prod_dlt_actual_price }}</div>
            <div class="itemInfoList">{{ rowitem.prod_dlt_qty }}</div>
            <div class="itemInfoList">{{ rowitem.prod_dlt_total }}</div>
          </div>
          <div class="underRow">
            <p>付款狀態</p>
            <div>{{ rowitem.po_pay === 0 ? '未付款' : '已付款' }}</div>
            <p>運送方式</p>
            <div>宅配</div>
            <p>訂單狀態</p>
            <div>{{ getStatus(rowitem.po_status) }}</div>
            <p>總金額</p>
            <div>{{ rowitem.po_sum }}</div>
          </div>
          <div class="pagination">
            <Page :total="productInfoArr.length" :page-size="itemsPerPage" v-model="currentPage" />
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
      currentItemId: '',
      rowitem: {},
      publicpath: "http://localhost/musesmuseum/public/phps/",
      originalProductInfoArr: [],
      productInfoArr: [],
      memBtnLink: [
        { link: "/Home/MemberInfo", name: "會員資料" },
        { link: "/Home/SearchProduct", name: "訂單查詢" },
        { link: "/Home/SearchTicket", name: "票券查詢" },
      ],
      currentPage: 1,
      itemsPerPage: 5,
      searchinput: "",
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
    fetchprod() {
      const currentURL = window.location.href;
      const urlParts = currentURL.split('/');
      const lastPart = urlParts[urlParts.length - 1];

      fetch(`${this.$store.state.publicpath}searchproductinfo.php`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json", // 使用 JSON 格式
      },
      body: JSON.stringify(lastPart), 
    })
      .then((response) => {
        if (response.ok) {
          return response.json();
        } else {
          throw new Error("新增失敗");
        }
      })
      .then((data) => {
        this.productInfoArr = data;
        this.rowitem = data[0]; 
      })
      .catch((error) => {
        console.log(error);
      });
    },
    getStatus(po_status) {
      po_status = parseInt(po_status);
      switch (po_status) {
        case 0:
          return '處理中';
        case 1:
          return '已確認';
        case 2:
          return '已出貨';
        case 3:
          return '已完成';
        default:
          return '未知';
      }
    },
  },
  mounted() {

    this.fetchprod();
    document.body.style.height = `auto`;
  }
};
</script>
<style scoped lang="scss">
.searchProdMain {
  .headerRow{
    p{
      width: auto;
    }
  }
  .yellowRow {
    justify-content: space-between;
  }

  .whiteRow {
    justify-content: space-between;
  }

  .itemInfoList {
    width: 100%;
    display: flex;
    justify-content: center;
  }
}

.backGroundCard {
  align-items: flex-start;
  justify-content: center;
}

.cardCenter {
  align-items: start;
}

.underRow {
  padding: 10px 16px;
  display: flex;
  justify-content: space-between;
  border-top: 2px solid $mblue;

  p {
    // width: 80px;
    color: $mgreen;
  }
}

@include t() {
  .searchProdMain {
    .productInfo {
      .headerRow {
        p {
          margin: auto;
        }
      }
    }

    .underRow {
      text-align: start;
      flex-wrap: wrap;

      p {
        width: 80px;
      }
    }
  }
}
</style>