<template>
  <div class="bgcGY cardCenter">
    <main class="searchProdMain">
      <div class="search">
        <Searchbar :functype="1" @update-search-text="searchClick" />
      </div>
      <div class="backGroundCard">
        <div class="backGroundCardBtns">
          <router-link :to="a.link" v-for="a in memBtnLink">
            <button
              :class="[a.name === '票券查詢' ? 'pinkBtnLight' : 'pinkBtn']"
            >
              {{ a.name }}
            </button>
          </router-link>
          </div>
          <div class="productInfo">
            <div class="headerRow">
              <p class="w140">購票編號</p>
              <p class="hideInfo">訂購日期</p>
              <p>總金額</p>
              <p  class="hideInfo">付款狀態</p>
              <p  class="hideInfo">購買數量</p>
            </div>
            <div 
            v-if="pagedProductInfo"
              v-for="(rowitem, rowindex) in pagedProductInfo" 
              :key="rowindex" 
              :class="[rowindex % 2 === 0 ? 'yellowRow' : 'whiteRow']"
              >
              <router-link 
              :to="`/Home/TicketQRcode/${rowitem.to_id}`" class="itemLink">
                <div class="itemInfoList w140">{{ rowitem.to_id }}</div>
                <span class="tooltip">查看詳細</span>
              </router-link>  
                <div class="hideInfo w100">{{ rowitem.to_date}}</div>
                <div class="w100">{{ rowitem.tkt_dlt_actual_price }}</div>
                <div class=" hideInfo w100">{{ rowitem.to_pay_status === 0 ? "已付款" : "未付款" }}</div>
                <div class="hideInfo w100">{{ rowitem.tkt_dlt_qty}}</div>
            </div>
            <div v-show="pagedProductInfo == 0"><p>查無資料</p></div>
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
    publicpath: "http://localhost/musesmuseum/public/phps/",
    productInfoArr:[],
    memBtnLink:[
        { link: "/Home/MemberInfo", name: "會員資料" },
        { link: "/Home/SearchProduct", name: "訂單查詢" },
        { link: "", name: "票券查詢" },
        { link: "/Home/LoveProduct", name: "收藏清單" },
      ],
      currentPage: 1,
      itemsPerPage: 5,
      searchinput: "",
    };
  },
  computed: {
    searchFilter() {
      if (this.searchinput) {
        return this.productInfoArr.filter((v) =>
          v.tkt_id?.includes(this.searchinput) ||v.to_date?.includes(this.searchinput) 
        );
      } else {
        return this.productInfoArr;
      }
    },
    pagedProductInfo() {
      const startIndex = (this.currentPage - 1) * this.itemsPerPage;
      const endIndex = startIndex + this.itemsPerPage;
      return this.searchFilter.slice(startIndex, endIndex);
    },
    totalPages() {
      return Math.ceil(this.pagedProductInfo.length / this.itemsPerPage);
    },
  },
  watch: {
    searchinput() {
      this.currentPage = 1;
    },
  },
  methods: {
    searchClick(text) {
      this.searchinput = text.toUpperCase();
    },
    async fetchticket() {
      function getCookieValue(cookieName) {
        const cookies = document.cookie.split(";");
        for (let i = 0; i < cookies.length; i++) {
          const cookie = cookies[i].trim();
          if (cookie.startsWith(cookieName + "=")) {
            return cookie.split("=")[1];
          }
        }
        return null;
      }
      const membersCookie = getCookieValue("members");
      if (membersCookie) {
        const membersData = JSON.parse(decodeURIComponent(membersCookie));
        const mbr_id = membersData.mbr_id;

        fetch(`${this.$store.state.publicpath}searchticket.php`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ mbr_id }), 
        })
          .then(async (response) => {
            this.productInfoArr = await response.json();
            if (this.productInfoArr.length > 0) {
              this.currentItemId = this.productInfoArr[0].id;
              this.rowitem = this.productInfoArr[0];
            }
          })
          .catch((error) => {
            console.error("發生錯誤:", error);
          });
      }
    },
  },
  mounted() {
    document.body.style.height = `auto`;
    this.fetchticket();
  },
};
</script>
<style scoped lang="scss">
.searchProdMain {
  .backGroundCard {
    justify-content: center;
  }
  .itemInfoList {
    margin: auto 27px;
    width: 48px;
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
  }
}

.cardCenter {
  align-items: start;
}
</style>
