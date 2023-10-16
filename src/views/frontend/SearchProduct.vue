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
            <button :class="[a.name === '訂單查詢' ? 'pinkBtnLight' : 'pinkBtn']">
              {{ a.name }}
            </button>
          </router-link>
        </div>
        <div class="productInfo">
          <div class="headerRow">
            <p>訂單編號</p>
            <p class="spacew"></p>
            <p class="hideInfo">訂購日期</p>
            <p>總金額</p>
            <p class="hideInfo">付款狀態</p>
            <p>訂單狀態</p>
          </div>
          <div
            v-for="(rowitem, rowindex) in pagedProductInfo"
            :key="rowindex"
            :class="[rowindex % 2 === 0 ? 'yellowRow' : 'whiteRow']"
          >
            <div class="itemInfoList">{{ rowitem.po_id }}</div>
            <div class="itemInfoList" v-if="rowitem.po_id" v-bind:key="rowitem.po_id">
              <router-link
                :to="`/Home/SearchProductInfo/${rowitem.po_id}`"
                class="itemLink"
              >
                <div class="itemInfoList">
                  <img
                    :src="
                      `${this.$store.state.imgpublicpath}image/productimage/` +
                      rowitem.prod_img
                    "
                    :alt="rowitem.prod_name"
                  />
                  <span class="tooltip">查看詳細</span>
                </div>
              </router-link>
              <div class="margin10 hideInfo">{{ rowitem.po_date }}</div>
              <div class="margin10">{{ rowitem.po_sum }}</div>
              <div class="margin10 hideInfo">
                {{ rowitem.po_pay === 0 ? "未付款" : "已付款" }}
              </div>
              <div class="margin10">{{ getStatus(rowitem.po_status) }}</div>
              <!-- <div
                  :id="rowitem.id"
                  :name="rowitem.name"
                  ></div> -->
            </div>
          </div>
          <div class="pagination">
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
        console.log(mbr_id); // 在這裡顯示 mbr_id

        fetch(`${this.$store.state.publicpath}searchproduct.php`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ mbr_id }), // 将 mbr_id 发送到后端
        })
          .then(async (response) => {
            this.productInfoArr = await response.json();
            if (this.productInfoArr.length > 0) {
              this.currentItemId = this.productInfoArr[0].id;
              this.rowitem = this.productInfoArr[0];
            }
            // const idToFind = this.$route.params.prod_id;
            // this.rowitem = this.productInfoArr.find((rowitem) => rowitem.prod_id === idToFind);
            // console.log(rowitem);
            console.log("fetchprod 方法被调用了");
            console.log(this.productInfoArr);
            console.log(this.rowitem.po_id);
          })
          .catch((error) => {
            console.error("發生錯誤:", error);
          });
      }
    },
    // // =======================
    // async fetchprod() {
    //   function getCookieValue(cookieName) {
    //     const cookies = document.cookie.split(";");
    //     for (let i = 0; i < cookies.length; i++) {
    //       const cookie = cookies[i].trim();
    //       if (cookie.startsWith(cookieName + "=")) {
    //         return cookie.split("=")[1];
    //       }
    //     }
    //     return null;
    //   }

    //   const membersCookie = getCookieValue("members");
    //   if (membersCookie) {
    //     const membersData = JSON.parse(decodeURIComponent(membersCookie));
    //     const mbr_id = membersData.mbr_id;

    //     return mbr_id;
    //   }
    //   console.log(mbr_id); // 在控制台中顯示 mbr_id
    //   fetch(`${this.$store.state.publicpath}searchproduct.php`, {
    //     method: "POST",
    //     headers: {
    //       "Content-Type": "application/json",
    //     },
    //     body: JSON.stringify({ mbr_id }), // 将 mbr_id 发送到后端
    //   })
    //     .then(async (response) => {
    //       this.productInfoArr = await response.json();
    //       if (this.productInfoArr.length > 0) {
    //         this.currentItemId = this.productInfoArr[0].id;
    //         this.rowitem = this.productInfoArr[0];
    //       }
    //       // const idToFind = this.$route.params.prod_id;
    //       // this.rowitem = this.productInfoArr.find((rowitem) => rowitem.prod_id === idToFind);
    //       // console.log(rowitem);
    //       console.log("fetchprod 方法被调用了");
    //       console.log(this.productInfoArr);
    //       console.log(this.rowitem.po_id);
    //     })
    //     .catch((error) => {
    //       console.error("發生錯誤:", error);
    //     });
    // },
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
      this.searchinput = text;
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
