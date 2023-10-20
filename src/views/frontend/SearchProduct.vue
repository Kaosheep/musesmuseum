<template>
  <div class="bgcGY cardCenter">
    <main class="searchProdMain">
      <div class="search">
        <Searchbar :functype="1" @update-search-text="searchClick" />
        <Searchbarclick />
      </div>
      <div class="backGroundCard">
        <div class="backGroundCardBtns">
          <router-link :to="a.link" v-for="a in memBtnLink">
            <button
              :class="[a.name === '訂單查詢' ? 'pinkBtnLight' : 'pinkBtn']"
            >
              {{ a.name }}
            </button>
          </router-link>
        </div>
        <div class="productInfo">
          <div class="headerRow">
            <p class="w140">訂單編號</p>
            <p class="hideInfo">訂購日期</p>
            <p>總金額</p>
            <p class="hideInfo">付款狀態</p>
            <p>訂單狀態</p>
          </div>
          <div
            v-if="pagedProductInfo"
            v-for="(rowitem, rowindex) in pagedProductInfo"
            :key="rowindex"
            :class="[rowindex % 2 === 0 ? 'yellowRow' : 'whiteRow']">
            <router-link
                :to="`/Home/SearchProductInfo/${rowitem.po_id}`"
                class="itemLink"
              >
            <div class="itemInfoList">{{ rowitem.po_id }}</div>
            <span class="tooltip">查看詳細</span>
              </router-link>
            <div
              class="itemInfoList"
              v-if="rowitem.po_id"
              v-bind:key="rowitem.po_id"
            >
                  <div class="itemInfoList w140">{{ rowitem.po_date }}</div>
              <div class="w100">{{ rowitem.po_sum }}</div>
              <div class="hideInfo w100">
                {{ rowitem.po_pay === 0 ? "未付款" : "已付款" }}
              </div>
              <div class="w100">{{ getStatus(rowitem.po_status) }}</div>
            </div>
          </div>
          <div v-show="pagedProductInfo == 0"><p>查無資料</p></div>

          <div class="pagination" v-if="pagedProductInfo">
            <Page
              :total="productInfoArr.length"
              :page-size="itemsPerPage"
              v-model="currentPage"
            />
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
      currentItemId: "",
      rowitem: {},
      publicpath: "http://localhost/musesmuseum/public/phps/",
      productInfoArr: [],
      po_id: [],
      po_date: [],
      po_sum: [],
      memBtnLink: [
        { link: "/Home/MemberInfo", name: "會員資料" },
        { link: "", name: "訂單查詢" },
        { link: "/Home/SearchTicket", name: "票券查詢" },
        { link: "/Home/LoveProduct", name: "收藏清單" },
      ],
      currentPage: 1,
      itemsPerPage: 4,
      searchinput: "",
    };
  },
  watch: {
    searchinput() {
      this.currentPage = 1;
    },
  },
  computed: {
    searchFilter() {
      if (this.searchinput) {
        return this.productInfoArr.filter(
          (v) =>
            v.po_id?.includes(this.searchinput) ||
            v.po_date?.includes(this.searchinput)
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
      return Math.ceil(this.searchFilter.length / this.itemsPerPage);
    },
  },
  methods: {
    async fetchprod() {
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

        fetch(`${this.$store.state.publicpath}searchproduct.php`, {
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
    getStatus(po_status) {
      po_status = parseInt(po_status);
      switch (po_status) {
        case 0:
          return "處理中";
        case 1:
          return "已確認";
        case 2:
          return "已出貨";
        case 3:
          return "已完成";
        default:
          return "未知";
      }
    },
    searchClick(text) {
      this.searchinput = text.toUpperCase();
    },
  },
  mounted() {
    document.body.style.height = `auto`;
    this.fetchprod();
  },
};
</script>
<style scoped lang="scss">
.backGroundCard {
  align-items: flex-start;
  justify-content: center;
}
.productInfo {
  white-space: nowrap;
}
.cardCenter {
  align-items: start;
}
</style>
