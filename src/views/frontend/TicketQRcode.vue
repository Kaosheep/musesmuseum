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
            <button :class="[a.name === '票券查詢' ? 'pinkBtnLight' : 'pinkBtn']">
              {{ a.name }}
            </button>
          </router-link>
        </div>

        <div class="productInfo">
          <div class="headerRow">
            <p>訂票編號</p>
            <p>票劵</p>
            <p>總金額</p>
            <p class="hideInfo">付款狀態</p>
            <p>使用張數</p>
          </div>
          <div v-for="(rowitem, rowindex) in pagedProductInfo" :key="rowindex"
            :class="[rowindex % 2 === 0 ? 'yellowRow' : 'whiteRow']">
            <div class="itemInfoList">
              <p>{{ rowitem.tkt_dlt_id }}</p>
            </div>
            <div class="itemInfoList fingerlink" @click="showSection(rowitem.tkt_dlt_id)">
              <div class="itemLink">
                <p>{{ rowitem.tkt_name }}</p>
                <span class="tooltip">QRcode票劵</span>
              </div>
            </div>

            <router-link v-if="currentId === rowitem.tkt_dlt_id" v-show="isSectionVisible"
              :to="`/Home/TicketQRcode/${rowitem.tkt_dlt_id}`">
              <section class="itemInfoList" id="showqrcode">
                <qrcode-vue :value="`${rowitem.tkt_dlt_id}`" :size="200" level="H" :margin="2" />
                <p>{{ rowitem.tkt_name }}</p>
              </section>
            </router-link>
            <div class="itemInfoList">
              <p class="w50">{{ rowitem.tkt_dlt_total }}</p>
            </div>
            <div class="itemInfoList hideInfo">
              <p class="w50" v-if="parseInt(rowitem.to_pay_status) === 0">未付款</p>
              <p class="w50" v-else-if="parseInt(rowitem.to_pay_status) === 1">已付款</p>
            </div>
            <div class="itemInfoList">
              <p class="w50">{{ rowitem.tkt_dlt_qty_used }}</p>
            </div>
          </div>
          <div class="mask" v-show="isSectionVisible" @click="hideSection"></div>
          <div class="pagination">
            <Page :total="ticketDlts.length" :page-size="itemsPerPage" v-model="currentPage" />
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
import QrcodeVue from "qrcode.vue";

export default {
  components: {
    Footer,
    Searchbar,
    Searchbarclick,
    QrcodeVue,
  },
  data() {
    return {
      isSectionVisible: false,
      productInfoArr: [],
      ticketDlts: [],
      memAllInfo: {},
      memBtnLink: [
        { link: "/Home/MemberInfo", name: "會員資料" },
        { link: "/Home/SearchProduct", name: "訂單查詢" },
        { link: "/Home/SearchTicket", name: "票券查詢" },
        { link: "/Home/LoveProduct", name: "收藏清單" },
      ],
      currentPage: 1,
      itemsPerPage: 5,
      currentId: 0,
    };
  },
  computed: {
    pagedProductInfo() {
      const startIndex = (this.currentPage - 1) * this.itemsPerPage;
      const endIndex = startIndex + this.itemsPerPage;
      return this.ticketDlts.slice(startIndex, endIndex);
    },
    totalPages() {
      return Math.ceil(this.ticketDlts.length / this.itemsPerPage);
    },
    currentItem() {
      return this.ticketDlts.find((v) => v.id === this.currentId) ?? {};
    },
  },
  methods: {

    fetchprod() {
      const currentURL = window.location.href;
      const urlParts = currentURL.split('/');
      const lastPart = urlParts[urlParts.length - 1];
      fetch(`${this.$store.state.publicpath}searchticket.php?to_id=${lastPart}`)
        .then(async (response) => {
          this.ticketDlts = await response.json();
        })
        .catch((error) => {
          console.error('發生錯誤:', error);
        });
    },
    showSection(id) {
      this.currentId = id;
      this.isSectionVisible = true;
    },
    hideSection() {
      this.isSectionVisible = false;
    },
    getTktDlt() {
      const formData = new URLSearchParams();
      formData.append("mbr_id", this.memAllInfo["mbr_id"]);
      fetch(`${this.$store.state.publicpath}tkt_dlt.php`, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: formData,
      }).then(async (response) => {
        this.ticketDlts = await response.json();
      });
    },
  },
  mounted() {
    document.body.style.height = `auto`;
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
          // console.log(this.memAllInfo);
        } else {
          console.error("Cookie中缺少屬性");
        }
      } catch (error) {
        console.error("解析Cookie數據錯誤", error);
      }
    }
    this.getTktDlt();
  },
};
</script>
<style scoped lang="scss">
.headerRow {
  p {
    margin: 0;

    &:nth-child(1) {
      width: 20%;
    }

    &:nth-child(2) {
      width: 10%;

    }

    &:nth-child(3) {
      width: 18%;

    }
}
}
.fingerlink {
  cursor: pointer;
}

section {
  position: fixed;
  background: #f5f5f5;
  @include tc;
  border-radius: 10px;
  z-index: 9;
}

.mask {
  position: fixed;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  background: rgba(251, 247, 150, 0.85);
  z-index: 1;
}

#showqrcode {
  width: 280px;
  height: 300px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

  p {
    margin-top: 1.5rem;
    font-size: 1.5rem;
  }
}

.backGroundCard {
  align-items: flex-start;
  justify-content: center;
}

.cardCenter {
  align-items: start;
}

@include t() {
  .searchProdMain {

    .headerRow {
      p {
        margin: 0;
        width: auto;
      }

      .underRow {
        text-align: start;
        flex-wrap: wrap;

        p {
          width: 80px;
        }
      }
    }

    section {
      left: 22%;
    }
  }
}
</style>
